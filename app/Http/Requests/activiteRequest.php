<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class activiteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => 'bail|required|string|unique:activites,Libelle',
            'entraineur' => 'bail|required|exists:entraineurs,id',
            'type' => 'bail|required|exists:type_activite,id',
            'planning' => 'bail|required|array',
            'planning.*' => 'exists:plannings,id',

        ];
    }

}
