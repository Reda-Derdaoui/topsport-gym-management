<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class typeAbonnementRequest extends FormRequest
{

       public function rules(): array
    {
        return [
            'libelle' => 'bail|required|string|unique:type_activite',
        ];
    }

    public function messages(): array
    {
        return [
            'libelle' => 'Already exist',
        ];
    }
}
