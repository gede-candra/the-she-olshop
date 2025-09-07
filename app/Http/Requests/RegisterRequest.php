<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users,username|regex:/^\S*$/u',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed',
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
            'name.required'      => 'Nama lengkap wajib diisi.',
            'name.string'        => 'Nama lengkap harus berupa teks.',
            'name.max'           => 'Nama lengkap tidak boleh lebih dari 255 karakter.',

            'username.required'  => 'Username wajib diisi.',
            'username.string'    => 'Username harus berupa teks.',
            'username.max'       => 'Username tidak boleh lebih dari 50 karakter.',
            'username.unique'    => 'Username sudah digunakan.',
            'username.regex'     => 'Username tidak boleh mengandung spasi.',

            'email.required'     => 'Email wajib diisi.',
            'email.string'       => 'Email harus berupa teks.',
            'email.email'        => 'Format email tidak valid.',
            'email.max'          => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique'       => 'Email sudah terdaftar.',

            'password.required'  => 'Password wajib diisi.',
            'password.string'    => 'Password harus berupa teks.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }
}
