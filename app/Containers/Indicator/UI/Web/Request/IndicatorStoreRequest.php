<?php

namespace App\Containers\Indicator\UI\Web\Request;

use Illuminate\Foundation\Http\FormRequest;

class IndicatorStoreRequest extends FormRequest
{
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
        return ['indicator.coefficient' => 'required|numeric|between:0,1'];
        #return [];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return ['indicator.coefficient.between' => 'Коефіцієнт мусить бути від 0 до 1'];
        #return [];
    }
}
