<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\typeActivityResquest;
use App\Models\Type_Activite;
use Illuminate\Http\Request;

class AdminTypeActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeActivite = Type_Activite::all()->last()->paginate(3);

        return view(
            'admin.adminTypeActivities',
            [
                'pageTitle' => 'Admin | Type activities',
                'typeActivities' => $typeActivite
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
    public function store(typeActivityResquest $request)
    {
        Type_Activite::create([
            'Libelle' => $request->libelle
        ]);

        return redirect('/admin/typeActivities')->with('success', 'type activite créé avec succès.');
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
        $typeActivitie = Type_Activite::find($id);

        return response()->json($typeActivitie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(typeActivityResquest $request, string $id)
    {
        $typeActivitie = Type_Activite::find($id);


        $typeActivitie->update([
            'Libelle' => $request->libelle
        ]);

        return redirect('admin/typeActivities')->with('success', 'type activite modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typeActivitie = Type_Activite::find($id);

        $typeActivitie->delete();

        return redirect('admin/typeActivities')->with('success', 'type activite suprimer avec succès.');
    }
}
