<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Activite;
use App\Models\Entraineur;
use App\Models\Planning;
use App\Models\Type_Activite;
use Illuminate\Http\Request;

class AdminActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activites = Activite::with([
            'type_activite',
            'planning',
            'admin.personne',
            'entraineur.personne'
        ])->get();

        $entraineur = Entraineur::with([
            'personne'
        ])->get();

        return view(
            'admin.adminActivities',
            [
                'pageTitle' => 'Admin | Activities',
                'activities' => $activites,
                'entraineurs' => $entraineur
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
