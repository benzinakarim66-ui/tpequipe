<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        // Statistiques générales
        $totalEquipes = Equipe::count();
        $totalJoueurs = Joueur::count();
        $totalButs = Joueur::sum('nombre_but');
        $totalCartesJaunes = Joueur::sum('carte_jaune');
        $totalCartesRouges = Joueur::sum('carte_rouge');

        // Meilleur buteur
        $meilleurButeur = Joueur::with('equipe')
            ->orderBy('nombre_but', 'desc')
            ->first();

        // Équipe avec le plus de buts
        $equipePlusButs = Equipe::withSum('joueurs', 'nombre_but')
            ->orderBy('joueurs_sum_nombre_but', 'desc')
            ->first();

        // Top 5 buteurs
        $topButeurs = Joueur::with('equipe')
            ->orderBy('nombre_but', 'desc')
            ->take(5)
            ->get();

        // Joueurs avec le plus de cartes jaunes
        $topCartesJaunes = Joueur::with('equipe')
            ->orderBy('carte_jaune', 'desc')
            ->take(5)
            ->get();

        // Joueurs avec le plus de cartes rouges
        $topCartesRouges = Joueur::with('equipe')
            ->orderBy('carte_rouge', 'desc')
            ->take(5)
            ->get();

        // Statistiques par équipe
        $statsParEquipe = Equipe::withCount('joueurs')
            ->withSum('joueurs', 'nombre_but')
            ->withSum('joueurs', 'carte_jaune')
            ->withSum('joueurs', 'carte_rouge')
            ->get();

        // Moyenne d'âge des joueurs
        $moyenneAge = Joueur::avg('age');

        // Répartition par poste
        $repartitionPostes = Joueur::selectRaw('poste, count(*) as total')
            ->groupBy('poste')
            ->get();

        return view('statistics.index', compact(
            'totalEquipes',
            'totalJoueurs',
            'totalButs',
            'totalCartesJaunes',
            'totalCartesRouges',
            'meilleurButeur',
            'equipePlusButs',
            'topButeurs',
            'topCartesJaunes',
            'topCartesRouges',
            'statsParEquipe',
            'moyenneAge',
            'repartitionPostes'
        ));
    }
}
