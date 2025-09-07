<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username_email' => 'required|max:255',
            'password'       => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username_email.required' => 'Username / Email wajib diisi.',
            'username_email.max'      => 'Username / Email tidak boleh lebih dari 255 karakter.',

            'password.required'       => 'Password wajib diisi.',
            'password.string'         => 'Password harus berupa teks.',
        ];
    }
}
