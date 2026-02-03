<?php

use App\Http\Controllers\EquipeController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Routes Equipe
Route::get('/equipes', [EquipeController::class, 'index'])->name('equipes.index');
Route::get('/equipes/create', [EquipeController::class, 'create'])->name('equipes.create');
Route::get('/equipes/{id}', [EquipeController::class, 'show'])->name('equipes.show');
Route::post('/equipes', [EquipeController::class, 'store'])->name('equipes.store');

// Routes Joueur
Route::get('/joueurs', [JoueurController::class, 'index'])->name('joueurs.index');
Route::get('/joueurs/create', [JoueurController::class, 'create'])->name('joueurs.create');
Route::post('/joueurs', [JoueurController::class, 'store'])->name('joueurs.store');

// Routes Statistiques
Route::get('/statistics', [StatisticController::class, 'index'])->name('statistics.index');
