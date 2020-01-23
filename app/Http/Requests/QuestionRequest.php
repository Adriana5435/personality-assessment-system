<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'questionnaire_id' => [
                'required',
                'integer',
                Rule::in([$this->route('questionnaire')->id])
            ],
            'pair_id' => [
                'required',
                'integer',
                'exists:pairs,id,questionnaire_id,' . $this->route('questionnaire')->id
            ],
            'title' => [
                'required',
                'string'
            ],
            'type_indicator_1_id' => [
                'required',
                'integer',
                'exists:type_indicators,id,questionnaire_id,' . $this->route('questionnaire')->id
            ],
            'point_first' => [
                'required',
                'integer'
            ],
            'option_first' => [
                'required',
                'string'
            ],
            'type_indicator_2_id' => [
                'required',
                'integer',
                'exists:type_indicators,id,questionnaire_id,' . $this->route('questionnaire')->id,
                'different:type_indicator_1_id'
            ],
            'point_second' => [
                'required',
                'integer'
            ],
            'option_second' => [
                'required',
                'string'
            ],
        ];
    }
}
