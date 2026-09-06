<?php

namespace App\Http\Controllers\responsable;

use App\Http\Controllers\Controller;
use App\Models\Activite;
use App\Models\Adherent;
use App\Models\Type_Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponsableListeAdherentController extends Controller
{
    public function index(Request $request)
    {
        $responsable = Auth::user()->responsable;
        $search = $request->string('search')->trim()->value();

        $adherents = Adherent::with([
            'personne',
            'responsable.personne',
            'abonnement.type_abonnement',
            'activite',
        ])
            ->where('responsable_id', $responsable->id)
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


        return view('responsable.responsableListeAdherents', [
            'adherents' => $adherents,
            'activites' => Activite::orderBy('Libelle')->get(),
            'typeAbonnements' => Type_Abonnement::orderBy('Libelle')->get(),
            'pageTitle' => 'Responsable | Liste adherents',
        ]);

    }

}
