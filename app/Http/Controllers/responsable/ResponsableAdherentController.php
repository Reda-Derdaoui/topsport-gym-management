<?php

namespace App\Http\Controllers\responsable;

use App\Http\Controllers\Controller;
use App\Http\Requests\adherentRequest;
use App\Models\Abonnement;
use App\Models\Activite;
use App\Models\Adherent;
use App\Models\Personne;
use App\Models\Type_Abonnement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResponsableAdherentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activites = Activite::all();
        $typAbonnements = Type_Abonnement::all();


        return view(
            'responsable/responsableAdherents',
            [
                'activites' => $activites,
                'typAbonnements' => $typAbonnements,
                'pageTitle' => 'Responsable | Adherents ',
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(adherentRequest $request)
    {
        $responsable = Auth::user()->responsable;


        DB::transaction(function () use ($request, $responsable) {

            $personne = Personne::create([
                'Nom' => $request->nom,
                'Prenom' => $request->prenom,
                'Tele' => $request->tele,
                'DateNaissance' => $request->date,
            ]);

            $adherent = new Adherent();
            $adherent->id = $personne->getKey();
            $adherent->responsable_id = $responsable->id;
            $adherent->Assurance = $request->prixAssurance;
            $adherent->save();

            $type = Type_Abonnement::findOrFail($request->typeAbon);
            $dateDebut = Carbon::parse($request->dateDebut);

            switch (strtolower($type->Libelle)) {

                case 'mensuel':
                    $dateFin = $dateDebut->copy()->addMonth();
                    break;

                case 'trimestriel':
                    $dateFin = $dateDebut->copy()->addMonths(3);
                    break;

                case 'annuel':
                    $dateFin = $dateDebut->copy()->addYear();
                    break;

                default:
                    $dateFin = null;
            }

            $abonnement = new Abonnement();
            $abonnement->typeAbonnement_id = $request->typeAbon;
            $abonnement->adherent_id = $adherent->getKey();
            $abonnement->responsable_id = $responsable->id;
            $abonnement->dateDebut = $dateDebut;
            $abonnement->dateFin = $dateFin;
            $abonnement->Prix = $request->prixAbonnement;
            $abonnement->save();


            $adherent->activite()->sync([$request->activite]);
        });



        return redirect()
            ->route('responsable.adherents.index')
            ->with('success', 'Adhérent créé avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(adherentRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
