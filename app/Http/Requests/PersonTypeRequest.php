<?php

namespace App\Http\Requests;

use App\PersonType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function foo\func;

class PersonTypeRequest extends FormRequest
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
        $questionnaire_id = $this->route('questionnaire')->id;
        $symbols = getTypeKeys($questionnaire_id);
        return [
            'type' => [
                'required',
                'string',
                Rule::in($symbols),
                Rule::unique('person_types', 'type')->where(function ($query) use($questionnaire_id){
                    $query->where('questionnaire_id', $questionnaire_id);
                })
            ],
            'report_type' => [
                'required',
                'integer',
                Rule::in(PersonType::getReportType())
            ],
            'item*' => [
                'string'
            ]
        ];
    }
}
