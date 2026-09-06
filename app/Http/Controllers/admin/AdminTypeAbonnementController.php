<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\typeAbonnementRequest;
use App\Models\Type_Abonnement;
use Illuminate\Http\Request;

class AdminTypeAbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $typeAbonnements = Type_Abonnement::when($search, function ($query, $search) {
            $query->where('Libelle', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'admin.adminTypeAbonnement',
            [
                'pageTitle' => 'Admin | Type abonnements',
                'typeAbonnements' => $typeAbonnements
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(typeAbonnementRequest $request)
    {
        Type_Abonnement::create([
            'Libelle' => $request->libelle
        ]);

        return redirect('/admin/typeAbonnements')->with('success', 'type abonnement créé avec succès.');
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
        $typeAbonnement = Type_Abonnement::find($id);

        return response()->json($typeAbonnement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(typeAbonnementRequest $request, string $id)
    {
        $typeAbonnement = Type_Abonnement::find($id);


        $typeAbonnement->update([
            'Libelle' => $request->libelle
        ]);

        return redirect('admin/typeAbonnements')->with('success', 'type abonnement modifié avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typeAbonnement = Type_Abonnement::find($id);

        $typeAbonnement->delete();

        return redirect('admin/typeAbonnements')->with('success', 'type abonnement suprimer avec succès.');
    }
}
