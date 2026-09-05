<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Planning;
use Illuminate\Http\Request;

class AdminPlanningsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $palnnings = Planning::when($search, function ($query, $search) {
            $query->where('jour_semain', 'like', '%' . $search . '%');

        })->paginate(5)
            ->withQueryString();

        return view(
            "admin.adminPlannings",
            [
                'pageTitle' => 'Admin | Plannings ',
                'plannings' => $palnnings
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
    public function store(Request $request)
    {
        Planning::create([
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'jour_semain' => $request->jour
        ]);

        return redirect('/admin/plannings')->with('success', 'Planning créé avec succès.');
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
        $planning = Planning::find($id);
        return response()->json($planning);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $planning = Planning::find($id);


        $planning->update([
            'heure_debut' => $request->planningHeureDebut,
            'heure_fin' => $request->planningHeureFin,
            'jour_semain' => $request->planningJour
        ]);


        return redirect('admin/plannings')->with('success', 'Planning modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $planning = Planning::find($id);


        $planning->delete();


        return redirect('admin/plannings')->with('success', 'Planning suprimer avec succès.');
    }
}
