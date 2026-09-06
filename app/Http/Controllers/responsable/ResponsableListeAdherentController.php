<?php

namespace App\Http\Controllers\responsable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponsableListeAdherentController extends Controller
{
    public function index()
    {
        return view("responsable.responsableListeAdherents", ['pageTitle' => 'Responsable | Lites adherents']);

    }

}
