<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use App\Questionnaire;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Response;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Display a listing of questions for a specific questionnaire.
     *
     * @param Questionnaire $questionnaire
     * @return View
     */
    public function index(Questionnaire $questionnaire) : View
    {
        // Retrieve all questions associated with the given questionnaire.
        $questions = $questionnaire->questions;

        return view('admin.question.index', ['questionnaire' => $questionnaire, 'questions' => $questions]);
    }

    /**
     * Show the form for creating a new question.
     *
     * @param Questionnaire $questionnaire
     * @return View
     */
    public function create(Questionnaire $questionnaire) : View
    {
        // Retrieve type indicators and pairs for the questionnaire.
        $typeIndicators = $questionnaire->typeIndicators;
        $pairs = $questionnaire->pairs;

        return view('admin.question.create', ['questionnaire' => $questionnaire, 'typeindicators' => $typeIndicators, 'pairs' => $pairs]);
    }

    /**
     * Store a newly created question in storage.
     *
     * @param QuestionRequest $request
     * @param Questionnaire $questionnaire
     * @return RedirectResponse
     */
    public function store(QuestionRequest $request, Questionnaire $questionnaire) : RedirectResponse
    {
        // Create a new question using the validated request data.
        Question::create($request->validated());

        // Redirect back to the create form with a success message.
        $typeIndicators = $questionnaire->typeIndicators;
        $pairs = $questionnaire->pairs;
        return redirect()->route('questionnaire.question.create', ['questionnaire' => $questionnaire, 'typeindicators' => $typeIndicators, 'pairs' => $pairs])->with('success', 'سوال با موفقیت افزوده شد.');
    }

    /**
     * Show the form for editing the specified question.
     *
     * @param Questionnaire $questionnaire
     * @param Question $question
     * @return View|Response
     */
    public function edit(Questionnaire $questionnaire, Question $question)
    {
        // Retrieve type indicators and pairs for the questionnaire.
        $typeIndicators = $questionnaire->typeIndicators;
        $pairs = $questionnaire->pairs;

        if ($questionnaire->id != $question->questionnaire_id) {
            abort(503);
        }

        return view('admin.question.edit', ['questionnaire' => $questionnaire, 'typeindicators' => $typeIndicators, 'pairs' => $pairs, 'question' => $question]);
    }

    /**
     * Update the specified question in storage.
     *
     * @param QuestionRequest $request
     * @param Questionnaire $questionnaire
     * @param Question $question
     * @return RedirectResponse
     */
    public function update(QuestionRequest $request, Questionnaire $questionnaire, Question $question): RedirectResponse
    {
        // Update the question using the validated request data.
        $question->update($request->validated());

        return redirect()->route('questionnaire.question.index', ['questionnaire' => $questionnaire])->with('success', 'سوال با موفقیت بروزرسانی شد.');
    }

}
