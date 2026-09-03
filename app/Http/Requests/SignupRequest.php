<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => 'bail|required|string',
            'prenom' => 'bail|required|string',
            'tele' => 'bail|required|string',
            'date' => 'bail|required|date',

            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Field required',
            'prenom.required' => 'Field required',
            'tele.required' => 'Field required',
            'date.required' => 'Field required',

            'email.required' => 'Field required',
            'email.email' => 'Please enter a valid email.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Field required',
            'password.min' => 'Password must contain at least 8 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ];
    }
}
