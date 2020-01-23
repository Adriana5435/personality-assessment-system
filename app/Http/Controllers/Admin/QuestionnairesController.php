<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionnaireRequest;
use App\Questionnaire;
use App\Submit;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuestionnairesController extends Controller
{
    /**
     * Display a listing of the questionnaires.
     *
     * @return View
     */
    public function index(): View
    {
        // Retrieve all questionnaires with their associated type indicators, sorted by latest.
        $questionnaires = Questionnaire::with('typeIndicators')->latest()->get();

        return view('admin.questionnaire.index', compact('questionnaires'));
    }

    /**
     * Show the form for creating a new questionnaire.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.questionnaire.create');
    }

    /**
     * Store a newly created questionnaire in storage.
     *
     * @param QuestionnaireRequest $request
     * @return RedirectResponse
     */
    public function store(QuestionnaireRequest $request): RedirectResponse
    {
        // Create a new questionnaire with the validated data from the request.
        Questionnaire::create($request->validated());

        return redirect()->route('questionnaire.index')->with('success', 'پرسشنامه با موفقیت ذخیره شد.');
    }

    /**
     * Show the form for editing the specified questionnaire.
     *
     * @param  Questionnaire  $questionnaire
     * @return View
     */
    public function edit(Questionnaire $questionnaire): View
    {
        return view('admin.questionnaire.edit', compact('questionnaire'));
    }

    /**
     * Update the specified questionnaire in storage.
     *
     * @param QuestionnaireRequest $request
     * @param Questionnaire $questionnaire
     * @return RedirectResponse
     */
    public function update(QuestionnaireRequest $request, Questionnaire $questionnaire): RedirectResponse
    {
        // Update the questionnaire with the validated data from the request.
        $questionnaire->update($request->validated());

        return redirect()->route('questionnaire.index')->with('success', 'پرسشنامه با موفقیت بروزرسانی شد.');
    }

    /**
     * Display a list of paid submissions for the admin dashboard.
     *
     * @return View
     */
    public function questonnairePaidList(): View
    {
        // Retrieve paid and submitted submissions for display in the admin dashboard.
        $submits = (new Submit)->paid()->submited()->paginate(20);

        return view('admin.home', compact('submits'));
    }

    /**
     * Display a report for a specific submission.
     *
     * @param Submit $submit
     * @return RedirectResponse
     */
    public function report(Submit $submit): RedirectResponse
    {
        // Generate and render a report PDF for the specified submission.
        if ($submit->isSubmited()) {
            return renderPDF($submit);
        }

        return redirect(route('admin.home'))->with('error', 'گزارش مورد نظر یافت نشد.');
    }

    /**
     * Display a list of payments for the admin panel.
     *
     * @return View
     */
    public function payment(): View
    {
        // Retrieve submissions with associated gateway transactions for admin payments view.
        $submits = (new Submit)
            ->join('gateway_transactions', 'submits.gateway_transaction_id', '=', 'gateway_transactions.id')
            ->paginate(20);

        return view('admin.payments', compact('submits'));
    }
}
