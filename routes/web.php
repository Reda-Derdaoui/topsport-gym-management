<?php

use App\Http\Controllers\admin\AdminActivitiesController;
use App\Http\Controllers\admin\AdminAdherentsController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminEntraineursController;
use App\Http\Controllers\admin\AdminPlanningsController;
use App\Http\Controllers\admin\AdminResponsablesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\responsable\ResponsableDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);


Route::middleware(['auth', 'nocache'])->group(function () {
    //Admin
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
    Route::Resource('/admin/responsables', AdminResponsablesController::class);
    Route::Resource('/admin/entraineurs', AdminEntraineursController::class);
    Route::Resource('/admin/adherents', AdminAdherentsController::class);
    Route::Resource('/admin/activities', AdminActivitiesController::class);
    Route::Resource('/admin/plannings', AdminPlanningsController::class);

    //Responsable
    Route::get('/responsable/dashboard', [ResponsableDashboardController::class, 'index']);
});


Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::get('/login', [AuthController::class, 'showloginForm'])->name('login');
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

