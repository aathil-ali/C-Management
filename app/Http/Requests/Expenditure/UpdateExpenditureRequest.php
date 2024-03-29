<?php

namespace App\Http\Requests\Expenditure;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenditureRequest extends FormRequest
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
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'type' => 'required',
            'comments' => 'nullable'
        ];
    }
}
