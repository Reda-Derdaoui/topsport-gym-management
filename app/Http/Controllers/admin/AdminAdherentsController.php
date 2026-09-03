<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAdherentsController extends Controller
{
    public function index()
    {
        return view('admin.adminAdherents', ['pageTitle' => 'Admin | Adherents']);
    }

    public function show(string $id)
    {
        //TODO: show all the adherents
    }
}
