<?php

use App\Http\Controllers\admin\AdminActivitiesController;
use App\Http\Controllers\admin\AdminAdherentsController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminEntraineursController;
use App\Http\Controllers\admin\AdminPlanningsController;
use App\Http\Controllers\admin\AdminResponsablesController;
use App\Http\Controllers\admin\AdminTypeAbonnementController;
use App\Http\Controllers\admin\AdminTypeActivitiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\responsable\ResponsableAdherentController;
use App\Http\Controllers\responsable\ResponsableDashboardController;
use App\Http\Controllers\responsable\ResponsableListeAdherentController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);


Route::middleware(['auth', 'nocache'])->group(function () {
    //Admin
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
    Route::Resource('/admin/responsables', AdminResponsablesController::class)->names('admin.responsables');
    Route::Resource('/admin/entraineurs', AdminEntraineursController::class)->names('admin.entraineurs');
    Route::Resource('/admin/adherents', AdminAdherentsController::class)->names('admin.adherents');
    Route::Resource('/admin/activities', AdminActivitiesController::class)->names('admin.activities');
    Route::Resource('/admin/plannings', AdminPlanningsController::class)->names('admin.plannings');
    Route::Resource('/admin/typeActivities', AdminTypeActivitiesController::class)->names('admin.typeActivities');
    Route::Resource('/admin/typeAbonnements', AdminTypeAbonnementController::class)->names('admin.typeAbonnements');

    //Responsable
    Route::get('/responsable/listeAdherents', [ResponsableListeAdherentController::class, 'index']);
    Route::Resource('/responsable/adherents', ResponsableAdherentController::class)->names('responsable.adherents');

});


Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::get('/login', [AuthController::class, 'showloginForm'])->name('login');
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

