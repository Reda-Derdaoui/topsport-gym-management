<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class entraineurRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => 'bail|required|string',
            'prenom' => 'bail|required|string',
            'tele' => 'bail|required|string',
            'date' => 'bail|required|date',
            'specialite' => 'bail|required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Field required',
            'prenom.required' => 'Field required',
            'tele.required' => 'Field required',
            'date.required' => 'Field required',
            'specialite.required' => 'Field required',
        ];
    }
}
