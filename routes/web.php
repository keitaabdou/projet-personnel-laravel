<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\TypeArticlesComp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Utilisateurs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Le groupes des routes relatives aux adminstrateurs uniquement
Route::group([
    "middleware" => ["auth","auth.admin"],
    "as" => "admin."
], function(){

    //GESTION DES HABILITATIONS
    Route::group([
        "prefix" =>"habilitations",
        "as" => "habilitations."
    ], function(){

        Route::get("/utilisateurs", Utilisateurs::class)->name("users.index");
    });

    //GESTION DES ARTICLES
    Route::group([
        "prefix" =>"gestarticles",
        "as" => "gestarticles."
    ], function(){

        Route::get("/typearticles", TypeArticlesComp::class)->name("typearticles");
    });
});

