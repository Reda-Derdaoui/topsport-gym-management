<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class adherentRequest extends FormRequest
{
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $responsable = Auth::user()?->responsable;

            if (!$responsable) {
                return;
            }

            $exists = \App\Models\Personne::where('Nom', $this->nom)
                ->where('Prenom', $this->prenom)
                ->where('Tele', $this->tele)
                ->where('DateNaissance', $this->date)
                ->whereHas('adherent', function ($query) use ($responsable) {
                    $query->where('responsable_id', $responsable->id);
                })
                ->exists();

            if ($exists) {
                $validator->errors()->add(
                    'message',
                    'Cet adhérent existe déjà pour ce responsable.'
                );
            }
        });
    }

    public function rules(): array
    {
        return [
            'nom' => 'bail|required|string',
            'prenom' => 'bail|required|string',
            'tele' => 'bail|required|string',
            'date' => 'bail|required|date',
            'prixAssurance' => 'bail|required|integer|min:10',
            'dateDebut' => 'bail|required|date',
            'prixAbonnement' => 'bail|required|integer|min:10',

            'activite' => 'bail|required|exists:activites,id',
            'typeAbon' => 'bail|required|exists:type_abonnement,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Field required',
            'prenom.required' => 'Field required',
            'tele.required' => 'Field required',
            'date.required' => 'Field required',
            'prixAssurance.required' => 'Field required',
            'dateDebut.required' => 'Field required',
            'prixAbonnement.required' => 'Field required',

        ];
    }
}
