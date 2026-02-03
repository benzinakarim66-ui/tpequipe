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
Route::get('/statistics/joueurs-equipe/{id}', [StatisticController::class, 'joueursEquipe'])->name('statistics.joueursEquipe');
Route::get('/statistics/equipe-joueur/{id}', [StatisticController::class, 'equipeJoueur'])->name('statistics.equipeJoueur');
Route::get('/statistics/joueurs-plus-5-buts', [StatisticController::class, 'joueursPlusDe5Buts'])->name('statistics.joueursPlusDe5Buts');
Route::get('/statistics/joueurs-cartes-rouges', [StatisticController::class, 'joueursCartesRouges'])->name('statistics.joueursCartesRouges');
Route::get('/statistics/joueurs-poste/{poste}', [StatisticController::class, 'joueursParPoste'])->name('statistics.joueursParPoste');
Route::get('/statistics/joueurs-20-30', [StatisticController::class, 'joueurs20a30'])->name('statistics.joueurs20a30');
Route::get('/statistics/joueurs-20-30-plus-10-buts', [StatisticController::class, 'joueurs20a30PlusDe10Buts'])->name('statistics.joueurs20a30PlusDe10Buts');
Route::get('/statistics/joueurs-attaquants-milieux', [StatisticController::class, 'joueursAttaquantsOuMilieux'])->name('statistics.joueursAttaquantsOuMilieux');
Route::get('/statistics/joueurs-tries-buts', [StatisticController::class, 'joueursTriesParButs'])->name('statistics.joueursTriesParButs');
Route::get('/statistics/top-5-buteurs', [StatisticController::class, 'top5Buteurs'])->name('statistics.top5Buteurs');
Route::get('/statistics/equipes-avec-joueurs', [StatisticController::class, 'equipesAvecJoueurs'])->name('statistics.equipesAvecJoueurs');
Route::get('/statistics/equipes-plus-5-joueurs', [StatisticController::class, 'equipesPlusDe5Joueurs'])->name('statistics.equipesPlusDe5Joueurs');
Route::get('/statistics/equipes-joueurs-moins-20', [StatisticController::class, 'equipesJoueursMoinsDe20'])->name('statistics.equipesJoueursMoinsDe20');
Route::get('/statistics/total-buts-equipe', [StatisticController::class, 'totalButsParEquipe'])->name('statistics.totalButsParEquipe');
Route::get('/statistics/equipes-tries-buts', [StatisticController::class, 'equipesTriesParButs'])->name('statistics.equipesTriesParButs');
Route::get('/statistics/moyenne-age', [StatisticController::class, 'moyenneAge'])->name('statistics.moyenneAge');
Route::get('/statistics/top-joueur', [StatisticController::class, 'topJoueur'])->name('statistics.topJoueur');
Route::get('/statistics/top-3-buteurs-equipe', [StatisticController::class, 'top3ButeursParEquipe'])->name('statistics.top3ButeursParEquipe');
