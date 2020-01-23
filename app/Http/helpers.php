<?php

use App\Questionnaire;
use App\Submit;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

/**
 * Generate all possible combinations of items.
 *
 * @param array $allItems
 * @return Collection
 */
function getAllPositions(array $allItems): Collection
{
    $itemsCollection = collect($allItems);
    $firstItem = $itemsCollection->shift();
    return collect($firstItem)->crossJoin(...$itemsCollection)->transform(function ($item) {
        return implode($item);
    });
}

/**
 * Perform personality type correction based on user answers.
 *
 * @param Submit $submit
 * @return string
 */
function correction(Submit $submit): string
{
    // Get the questionnaire with relations
    $questionnaire = $submit->questionnaire()->withAll()->first();
    $typeIndicators = $questionnaire->typeIndicators;

    // Initialize arrays for type indicators and their symbols
    $allTypeIndicators = [];
    $allTypeIndicatorsSymbol = [];
    foreach ($typeIndicators as $typeIndicator) {
        $allTypeIndicators[$typeIndicator->id] = 0;
        $allTypeIndicatorsSymbol[$typeIndicator->id] = $typeIndicator->symbol;
    }

    $questions = $questionnaire->questions;
    $userAnswers = $submit->submit_data;

    // Calculate type indicator scores based on user answers
    foreach ($questions as $question) {
        if (isset($userAnswers['q' . $question->id])) {
            if ($userAnswers['q' . $question->id] == 1) {
                $allTypeIndicators[$question->type_indicator_1_id] += $question->point_first;
            } elseif ($userAnswers['q' . $question->id] == 2) {
                $allTypeIndicators[$question->type_indicator_2_id] += $question->point_second;
            }
        }
    }

    $pairs = $questionnaire->pairs;
    $correction = [];
    foreach ($pairs as $pair) {
        if ($allTypeIndicators[$pair['type_indicator_1_id']] > $allTypeIndicators[$pair['type_indicator_2_id']]) {
            $correction[] = $pair['type_indicator_1_id'];
        } elseif ($allTypeIndicators[$pair['type_indicator_1_id']] < $allTypeIndicators[$pair['type_indicator_2_id']]) {
            $correction[] = $pair['type_indicator_2_id'];
        } else {
            $correction[] = $pair['type_indicator_prefered_id'];
        }
    }

    $finalCorrection = '';
    foreach ($correction as $item) {
        $finalCorrection .= $allTypeIndicatorsSymbol[$item];
    }

    return $finalCorrection;
}

/**
 * Generate and render a PDF report for the given submit.
 *
 * @param Submit $submit
 * @return Response|void
 */
function renderPDF(Submit $submit)
{
    $questionnaire = $submit->questionnaire()->withAll()->first();
    $correction = correction($submit);

    // Check which version of the report type is selected
    $personTypes = $questionnaire->personTypes()->whereType($correction)->first();
    if (!$personTypes) {
        return abort(503);
    }

    $blade = ($personTypes->report_type == \App\PersonType::FromPDF) ? 'front.questionnaire.pdf' : 'front.questionnaire.text';
    $user = $submit->user;

    $details = [];
    $collection = collect($personTypes->details->toArray())->transform(function ($item, $key) {
        return [$item['key'] => $item['value']];
    })->toArray();

    // Transform the collection of details into an associative array
    foreach ($collection as $key => $value) {
        $details[key($value)] = nl2br($value[key($value)], false);
    }

    // Generate and return the PDF
    $pdf = \PDF::loadView($blade, compact('questionnaire', 'personTypes', 'user', 'details'), [], ['format' => 'A4-L']);
    return $pdf->stream('questionnaire_' . $questionnaire->id . '_' . $submit->id);
}

/**
 * Get type keys for a given questionnaire.
 *
 * @param int $questionnaire
 * @return Collection|false
 */
function getTypeKeys(int $questionnaire)
{
    $questionnaire = Questionnaire::with(['pairs.typeIndicator1', 'pairs.typeIndicator2'])->where('id', $questionnaire)->get();
    $allPairs = $questionnaire->toArray();

    $symbols = [];
    if (!empty($allPairs) && isset($allPairs[0]['pairs'])) {
        foreach ($allPairs[0]['pairs'] as $pairs) {
            $symbols[] = [$pairs['type_indicator1']['symbol'], $pairs['type_indicator2']['symbol']];
        }
    } else {
        return false;
    }

    return getAllPositions($symbols);
}
