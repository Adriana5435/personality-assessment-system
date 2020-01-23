<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PairRequest extends FormRequest
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
        $data = $this->validationData();
        $pairs = [$data['type_indicator_1_id'], $data['type_indicator_2_id']];
        return [
            'questionnaire_id' => [
                'required',
                'integer',
                Rule::in([$this->route('questionnaire')->id])
            ],
            'type_indicator_1_id' => [
                'required',
                'integer',
                'exists:type_indicators,id,questionnaire_id,' . $this->route('questionnaire')->id
            ],
            'type_indicator_2_id' => [
                'required',
                'integer',
                'exists:type_indicators,id,questionnaire_id,' . $this->route('questionnaire')->id,
                'different:type_indicator_1_id'
            ],
            'type_indicator_prefered_id' => [
                'required',
                'integer',
                'exists:type_indicators,id,questionnaire_id,' . $this->route('questionnaire')->id,
                Rule::in($pairs)
            ]
        ];
    }
}
