<?php

namespace App\Http\Requests\Tithes;

use Illuminate\Foundation\Http\FormRequest;

class StoreTitheRequest extends FormRequest
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
            'user_id' => 'required',
            'comments' => 'nullable'
        ];
    }
}
