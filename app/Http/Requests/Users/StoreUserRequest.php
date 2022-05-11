<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required',
            'residence' => 'required',
            'family_id' => 'required|integer',
            'ministry' => 'required',
            'phone_number' => 'required',
            'profession' => 'required',
            'marital_status' => 'required',
            'email' => 'required'
        ];
    }
}
