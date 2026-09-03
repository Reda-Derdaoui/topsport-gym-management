<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\entraineurRequest;
use App\Models\Entraineur;
use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminEntraineursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Entraineur::with([
            'personne',
            'admin.personne'
        ])->latest()->paginate(3);

        return view('admin.adminEntraineurs', [
            'entraineurs' => $data,
            'pageTitle' => 'Admin | Entraineurs'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO: Show the Entraineur formulaire (GET)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(entraineurRequest $request)
    {
        $admin = Auth::user()->admin;

        DB::transaction(function () use ($admin, $request) {
            $personne = Personne::create([
                'Nom' => $request->nom,
                'Prenom' => $request->prenom,
                'Tele' => $request->tele,
                'DateNaissance' => $request->date,
            ]);

            Entraineur::create([
                'id' => $personne->id,
                'admin_id' => $admin->id,
                'Specialite' => $request->specialite
            ]);

        });

        return redirect('/admin/entraineurs')->with('success', 'Entraineur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //TODO: Display all the Entraieurs (GET)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $entraineur = Entraineur::with('personne')->findOrFail($id);

        return response()->json($entraineur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(entraineurRequest $request, string $id)
    {
        $entraineur = Entraineur::findOrFail($id);
        $personne = Personne::findOrFail($entraineur->id);

        if ($personne && $entraineur) {

            $personne->update([
                'Nom' => $request->nom,
                'Prenom' => $request->prenom,
                'Tele' => $request->tele,
                'DateNaissance' => $request->date,
            ]);

            $entraineur->update([
                'Specialite' => $request->specialite
            ]);
        }

        return redirect('admin/entraineurs')->with('success', 'Entraineur modifié avec succès.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entraineur = Entraineur::findOrFail($id);
        $personne = Personne::findOrFail($entraineur->id);

        if ($entraineur && $personne) {
            $personne->delete();
            $entraineur->delete();
        }

        return redirect('admin/entraineurs')->with('success','Entraineur suprimer avec succès.');
    }
}
