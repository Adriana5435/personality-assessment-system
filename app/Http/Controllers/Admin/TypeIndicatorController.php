<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeIndicatorRequest;
use App\Questionnaire;
use App\TypeIndicator;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Void_;
use Symfony\Component\HttpFoundation\Response;

class TypeIndicatorController extends Controller
{
    /**
     * Display a listing of the type indicators for a specific questionnaire.
     *
     * @param Questionnaire $questionnaire
     * @return View
     */
    public function index(Questionnaire $questionnaire): View
    {
        // Retrieve all type indicators associated with the given questionnaire.
        $typeIndicators = $questionnaire->typeIndicators;

        return view('admin.typeindicator.index', ['questionnaire' => $questionnaire, 'typeindicators' => $typeIndicators]);
    }

    /**
     * Show the form for creating a new type indicator.
     *
     * @param Questionnaire $questionnaire
     * @return View
     */
    public function create(Questionnaire $questionnaire): View
    {
        return view('admin.typeindicator.create', compact('questionnaire'));
    }

    /**
     * Store a newly created type indicator in storage.
     *
     * @param TypeIndicatorRequest $request
     * @param Questionnaire $questionnaire
     * @return RedirectResponse
     */
    public function store(TypeIndicatorRequest $request, Questionnaire $questionnaire): RedirectResponse
    {
        // Create a new type indicator associated with the questionnaire.
        $questionnaire->typeIndicators()->create($request->validated());

        return redirect()->route('questionnaire.typeindicator.index', $questionnaire)->with('success', __('The type indicator was saved successfully.'));
    }

    /**
     * Show the form for editing the specified type indicator.
     *
     * @param Questionnaire $questionnaire
     * @param int $typeIndicator
     * @return void|View
     */
    public function edit(Questionnaire $questionnaire, int $typeIndicator)
    {
        // Find the specified type indicator or abort if not found.
        $typeIndicator = TypeIndicator::findOrFail($typeIndicator);

        // Check if the type indicator belongs to the given questionnaire.
        if ($questionnaire->id != $typeIndicator->questionnaire_id) {
            return abort(503);
        }

        return view('admin.typeindicator.edit', ['questionnaire' => $questionnaire, 'typeindicator' => $typeIndicator]);
    }

    /**
     * Update the specified type indicator in storage.
     *
     * @param TypeIndicatorRequest $request
     * @param Questionnaire $questionnaire
     * @param int $typeIndicator
     * @return RedirectResponse
     */
    public function update(TypeIndicatorRequest $request, Questionnaire $questionnaire, int $typeIndicator): RedirectResponse
    {
        // Find the specified type indicator or abort if not found.
        $typeIndicatorModel = TypeIndicator::findOrFail($typeIndicator);

        // Update the type indicator attributes.
        $typeIndicatorModel->update($request->validated());

        return redirect()->route('questionnaire.typeindicator.index', $questionnaire)->with('success', __('The type indicator was updated successfully.'));
    }

}
