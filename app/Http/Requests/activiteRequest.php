<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class activiteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'entraineur' => 'bail|required|exists:entraineurs,id',
            'type' => 'bail|required|exists:type_activite,id',
            'planning' => 'bail|required|array',
            'planning.*' => 'exists:plannings,id',

        ];
    }

}
