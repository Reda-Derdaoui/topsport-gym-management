<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Adherent;
use Illuminate\Http\Request;

class AdminAdherentsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->string('search')->trim()->value();

        $adherents = Adherent::with([
            'personne',
            'responsable.personne',
            'abonnement.type_abonnement',
            'activite',
        ])
            ->when($search, function ($query, $search) {
                $query->where(function ($searchQuery) use ($search) {
                    $searchQuery->whereHas('personne', function ($personneQuery) use ($search) {
                        $personneQuery->where('Nom', 'like', "%{$search}%")
                            ->orWhere('Prenom', 'like', "%{$search}%");
                    })->orWhereHas('abonnement.type_abonnement', function ($typeQuery) use ($search) {
                        $typeQuery->where('Libelle', 'like', "%{$search}%");
                    })->orWhereHas('activite', function ($activiteQuery) use ($search) {
                        $activiteQuery->where('Libelle', 'like', "%{$search}%");
                    });
                });
            })
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.adminAdherents', [
            'adherents' => $adherents,
            'pageTitle' => 'Admin | Adherents',
        ]);
    }

    public function show(string $id)
    {
        //TODO: show all the adherents
    }
}
