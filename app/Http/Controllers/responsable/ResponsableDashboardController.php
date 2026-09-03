<?php

namespace App\Http\Controllers\responsable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponsableDashboardController extends Controller
{
    public function index()
    {
        return view('responsable.dashboard', ['pageTitle' => 'Responsable | Dashboard']);
    }
}
