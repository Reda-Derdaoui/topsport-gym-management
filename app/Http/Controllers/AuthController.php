<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\Admin;
use App\Models\Personne;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        // If an Admin already exists, signup is no longer allowed
        if (Admin::exists()) {
            abort(404);
        }

        return view('auth.signup', ['pageTitle' => 'Sign Up']);
    }

    public function signup(SignupRequest $request)
    {
        // Prevent creating another Admin through public signup
        if (Admin::exists()) {
            abort(404);
        }

        DB::transaction(function () use ($request) {
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

            Admin::create([
                'id' => $personne->id,
                'user_id' => $user->id
            ]);

            Auth::login($user);
        });

        return redirect('/');
    }
    public function showLoginForm()
    {
        return view('auth.login', ['pageTitle' => 'Login']);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            if ($user->admin) {
                $request->session()->regenerate();
                return redirect('/admin/dashboard');
            }

            if ($user->responsable) {
                $request->session()->regenerate();
                return redirect('/responsable/listeAdherents');
            }

            return back()->withErrors([
                'email' => 'Rôle utilisateur invalide.',
            ])->withInput();
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
