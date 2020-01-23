<?php

namespace App\Http\Controllers\Admin;

use App\PersonType;
use App\Http\Controllers\Controller;
use App\PersonTypeDetail;
use App\Questionnaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PersonTypeRequest;
use Illuminate\View\View;

class PersonTypeController extends Controller
{
    /**
     * Display a listing of the person types for a specific questionnaire.
     *
     * @param Questionnaire $questionnaire
     * @return View
     */
    public function index(Questionnaire $questionnaire) : View
    {
        // Retrieve all person types associated with the given questionnaire.
        $personTypes = $questionnaire->personTypes;

        return view('admin.persontype.index', compact('questionnaire', 'personTypes'));
    }

    /**
     * Show the form for creating a new person type.
     *
     * @param Questionnaire $questionnaire
     * @return View|RedirectResponse
     */
    public function create(Questionnaire $questionnaire)
    {
        // Retrieve type keys for the questionnaire.
        $symbols = getTypeKeys($questionnaire->id);

        if (!$symbols) {
            return redirect()->route('questionnaire.index', $questionnaire)->with('error', 'هنوز دوقطبی برای این پرسشنامه تعریف نشده است.');
        }

        return view('admin.persontype.create', ['questionnaire' => $questionnaire, 'personTypes' => $symbols]);
    }

    /**
     * Store a newly created person type in storage.
     *
     * @param PersonTypeRequest $request
     * @param Questionnaire $questionnaire
     * @return RedirectResponse
     */
    public function store(PersonTypeRequest $request, Questionnaire $questionnaire) : RedirectResponse
    {
        // Create a new person type using the validated request data.
        $personType = $questionnaire->personTypes()->create($request->only(['type', 'report_type']));

        $items = collect(collect($request->except(['type', 'report_type']))->except('_token')->get('item'))->values()->transform(function ($item) {
            return ['key' => $item[0], 'value' => $item[1]];
        })->all();

        // Create person type details.
        $personType->details()->createMany($items);

        return redirect()->route('questionnaire.persontype.index', $questionnaire)->with('success', 'تیپ شخصیتی با موفقیت ذخیره شد.');
    }

    /**
     * Show the form for editing the specified person type.
     *
     * @param Questionnaire $questionnaire
     * @param $thePersonType
     * @return View
     */
    public function edit(Questionnaire $questionnaire, $thePersonType) : View
    {
        // Find the person type and retrieve associated details.
        $thePersonType = PersonType::findOrFail($thePersonType);
        $personTypes = getTypeKeys($questionnaire->id);
        $details = collect($thePersonType->details()->get(['key', 'value'])->toArray());

        return view('admin.persontype.edit', compact('questionnaire', 'personTypes', 'thePersonType', 'details'));
    }

    /**
     * Update the specified person type in storage.
     *
     * @param Request $request
     * @param Questionnaire $questionnaire
     * @param $personType
     * @return RedirectResponse
     */
    public function update(Request $request, Questionnaire $questionnaire,  $personType) : RedirectResponse
    {
        // Find the person type to update.
        $thePersonType = PersonType::findOrFail($personType);
        $thePersonType->update($request->only(['type', 'report_type']));

        $items = collect(collect($request->except(['type', 'report_type']))->except(['_token', '_method'])->get('item'))->values()->transform(function ($item) {
            return ['key' => $item[0], 'value' => $item[1]];
        })->all();

        // Update or create person type details.
        foreach ($items as $item) {
            PersonTypeDetail::updateOrCreate(['person_type_id' => $personType, 'key' => $item['key']], ['value' => $item['value']]);
        }

        return redirect()->route('questionnaire.persontype.index', [$questionnaire, $personType])->with('success', 'گزارش تیپ شخصیتی با موفقیت بروزرسانی شد.');
    }

}
