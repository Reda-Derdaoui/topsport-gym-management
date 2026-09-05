<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\responsableRequest;
use App\Models\Admin;
use App\Models\Personne;
use App\Models\Responsable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminResponsablesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $responsables = Responsable::with([
            'personne',
            'admin.personne'
        ])
            ->when($search, function ($query, $search) {
                $query->whereHas('personne', function ($q) use ($search) {
                    $q->where('Nom', 'like', "%{$search}%")
                        ->orWhere('Prenom', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.adminResponsables', [
            'responsables' => $responsables,
            'pageTitle' => 'Admin | Responsables'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO: Show the Responsables formulaire (GET)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(responsableRequest $request)
    {

        $admin = Auth::user()->admin;

        DB::transaction(function () use ($admin, $request) {
            $personne = Personne::create([
                'Nom' => $request->nom,
                'Prenom' => $request->prenom,
                'Tele' => $request->tele,
                'DateNaissance' => $request->date,
            ]);

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Responsable::create([
                'id' => $personne->id,
                'admin_id' => $admin->id,
                'user_id' => $user->id
            ]);
        });

        return redirect('/admin/responsables')->with('success', 'Responsable créé avec succès.');
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
        $responsable = Responsable::with('personne')->findOrFail($id);

        return response()->json($responsable);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $responsable = Responsable::findOrFail($id);

        $personne = Personne::findOrFail($responsable->id);

        $personne->update([
            'Nom' => $request->nom,
            'Prenom' => $request->prenom,
            'Tele' => $request->tele,
            'DateNaissance' => $request->date,
        ]);

        return redirect('admin/responsables')->with('success', 'Responsable modifié avec succès.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $responsable = Responsable::findOrFail($id);
        $personne = Personne::findOrFail($responsable->id);
        $user = User::findOrFail($responsable->user_id);

        $user->delete();
        $personne->delete();
        $responsable->delete();

        return redirect('admin/responsables')->with('success', 'Responsable suprimer avec succès.');
    }
}
