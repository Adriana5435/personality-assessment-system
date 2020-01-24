<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PairRequest;
use App\Questionnaire;
use App\Pair;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PairController extends Controller
{
    /**
     * Display a listing of the pairs for a specific questionnaire.
     *
     * @param Questionnaire $questionnaire
     * @return View
     */
    public function index(Questionnaire $questionnaire): View
    {
        // Retrieve all pairs associated with the given questionnaire.
        $pairs = $questionnaire->pairs;

        return view('admin.pair.index', ['questionnaire' => $questionnaire, 'pairs' => $pairs]);
    }

    /**
     * Show the form for creating a new pair.
     *
     * @param Questionnaire $questionnaire
     * @return View
     */
    public function create(Questionnaire $questionnaire): View
    {
        // Retrieve the type indicators associated with the questionnaire.
        $typeIndicators = $questionnaire->typeIndicators;

        return view('admin.pair.create', ['questionnaire' => $questionnaire, 'typeindicators' => $typeIndicators]);
    }

    /**
     * Store a newly created pair in storage.
     *
     * @param PairRequest $request
     * @param Questionnaire $questionnaire
     * @return View
     */
    public function store(PairRequest $request, Questionnaire $questionnaire): View
    {
        // Create a new pair using the validated request data.
        Pair::create($request->validated());

        // Retrieve all pairs associated with the questionnaire.
        $pairs = $questionnaire->pairs;

        return view('admin.pair.index', ['questionnaire' => $questionnaire, 'pairs' => $pairs]);
    }

    /**
     * Show the form for editing the specified pair.
     *
     * @param Questionnaire $questionnaire
     * @param Pair $pair
     * @return View|Response
     */
    public function edit(Questionnaire $questionnaire, Pair $pair)
    {
        // Check if the pair belongs to the given questionnaire.
        if ($questionnaire->id != $pair->questionnaire_id) {
            return abort(404);
        }

        return view('admin.pair.edit', ['questionnaire' => $questionnaire, 'pair' => $pair]);
    }

    /**
     * Update the specified pair in storage.
     *
     * @param PairRequest $request
     * @param Questionnaire $questionnaire
     * @param Pair $pair
     * @return RedirectResponse
     */
    public function update(PairRequest $request, Questionnaire $questionnaire, Pair $pair): RedirectResponse
    {
        // Update the pair attributes using the validated request data.
        $pair->update($request->validated());

        return redirect()->route('questionnaire.pair.index', $questionnaire)->with('success', __('The pair was updated successfully.'));
    }
}
