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
Route::get('/statistics/general', [StatisticController::class, 'general'])->name('statistics.general');
Route::get('/statistics/top-buteurs', [StatisticController::class, 'topButeurs'])->name('statistics.topButeurs');
Route::get('/statistics/cartes', [StatisticController::class, 'cartes'])->name('statistics.cartes');
Route::get('/statistics/par-equipe', [StatisticController::class, 'parEquipe'])->name('statistics.parEquipe');
Route::get('/statistics/par-poste', [StatisticController::class, 'parPoste'])->name('statistics.parPoste');
Route::get('/statistics/joueurs-filtres', [StatisticController::class, 'joueursFiltres'])->name('statistics.joueursFiltres');
Route::get('/statistics/equipes-filtres', [StatisticController::class, 'equipesFiltres'])->name('statistics.equipesFiltres');
