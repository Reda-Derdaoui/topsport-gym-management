<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\activiteRequest;
use App\Models\Activite;
use App\Models\Entraineur;
use App\Models\Planning;
use App\Models\Type_Activite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activites = Activite::with([
            'entraineur.personne',
            'admin.personne',
            'type_activite',
            'planning'
        ])->get()->last()->paginate(3);

        $entraineurs = Entraineur::with([
            'personne'
        ])->get();

        $types = Type_Activite::all();
        $plannings = Planning::all();

        return view(
            'admin.adminActivities',
            [
                'pageTitle' => 'Admin |Activities',
                'entraineurs' => $entraineurs,
                'typeActivities' => $types,
                'plannings' => $plannings,
                'activites' => $activites
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
    public function store(activiteRequest $request)
    {

        $admin = Auth::user()->admin;

        $activite = Activite::create([
            'Libelle' => $request->nom,
            'entraineur_id' => $request->entraineur,
            'id_admin' => $admin->id,
            'type_activite_id' => $request->type
        ]);

        $activite->planning()->attach($request->planning);

        return redirect('/admin/activities')->with('success', 'activite créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activite = Activite::with([
            'type_activite',
            'entraineur.personne',
            'planning'
        ])->findOrFail($id);

        return response()->json([
            'id' => $activite->id,

            'Libelle' => $activite->libelleAct,

            // Type
            'type_activite_id' => $activite->type_activite_id,

            // Entraîneur
            'entraineur_id' => $activite->entraineur_id,

            // Planning
            'planning' => $activite->planning->map(function ($planning) {
                return [
                    'id' => $planning->id,
                    'jour_semain' => $planning->jour_semain,
                    'heure_debut' => $planning->heure_debut,
                    'heure_fin' => $planning->heure_fin,
                ];
            }),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(activiteRequest $request, string $id)
    {
        $activite = Activite::findOrFail($id);

        $activite->update([
            'Libelle' => $request->libelle,
            'type_activite_id' => $request->type,
            'entraineur_id' => $request->entraineur,
        ]);

        $activite->planning()->sync($request->planning);

        return redirect('/admin/activities')->with('success', 'activite modifiée  avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
