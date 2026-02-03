<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    // Page principale - Menu des statistiques
    public function index()
    {
        return view('statistics.index');
    }

    // Statistiques générales
    public function general()
    {
        $totalEquipes = Equipe::count();
        $totalJoueurs = Joueur::count();
        $totalButs = Joueur::sum('nombre_but');
        $totalCartesJaunes = Joueur::sum('carte_jaune');
        $totalCartesRouges = Joueur::sum('carte_rouge');
        $moyenneAge = Joueur::avg('age');

        return view('statistics.general', compact(
            'totalEquipes',
            'totalJoueurs',
            'totalButs',
            'totalCartesJaunes',
            'totalCartesRouges',
            'moyenneAge'
        ));
    }

    // Top Buteurs
    public function topButeurs()
    {
        $meilleurButeur = Joueur::with('equipe')
            ->orderBy('nombre_but', 'desc')
            ->first();

        $topButeurs = Joueur::with('equipe')
            ->orderBy('nombre_but', 'desc')
            ->take(10)
            ->get();

        return view('statistics.top-buteurs', compact('meilleurButeur', 'topButeurs'));
    }

    // Statistiques des cartes
    public function cartes()
    {
        $topCartesJaunes = Joueur::with('equipe')
            ->orderBy('carte_jaune', 'desc')
            ->take(10)
            ->get();

        $topCartesRouges = Joueur::with('equipe')
            ->orderBy('carte_rouge', 'desc')
            ->take(10)
            ->get();

        return view('statistics.cartes', compact('topCartesJaunes', 'topCartesRouges'));
    }

    // Statistiques par équipe
    public function parEquipe()
    {
        $statsParEquipe = Equipe::withCount('joueurs')
            ->withSum('joueurs', 'nombre_but')
            ->withSum('joueurs', 'carte_jaune')
            ->withSum('joueurs', 'carte_rouge')
            ->get();

        $equipePlusButs = Equipe::withSum('joueurs', 'nombre_but')
            ->orderBy('joueurs_sum_nombre_but', 'desc')
            ->first();

        return view('statistics.par-equipe', compact('statsParEquipe', 'equipePlusButs'));
    }

    // Répartition par poste
    public function parPoste()
    {
        $repartitionPostes = Joueur::selectRaw('poste, count(*) as total, sum(nombre_but) as total_buts')
            ->groupBy('poste')
            ->get();

        return view('statistics.par-poste', compact('repartitionPostes'));
    }

    // Joueurs filtrés (plus de 5 buts, cartes rouges, par âge)
    public function joueursFiltres()
    {
        // Joueurs ayant plus de 5 buts
        $joueursPlusDe5Buts = Joueur::with('equipe')
            ->where('nombre_but', '>', 5)
            ->get();

        // Joueurs ayant au moins 1 carte rouge
        $joueursCartesRouges = Joueur::with('equipe')
            ->where('carte_rouge', '>', 0)
            ->get();

        // Joueurs entre 20 et 30 ans
        $joueurs20a30 = Joueur::with('equipe')
            ->whereBetween('age', [20, 30])
            ->get();

        // Joueurs 20-30 ans avec plus de 10 buts
        $joueurs20a30PlusDe10Buts = Joueur::with('equipe')
            ->whereBetween('age', [20, 30])
            ->where('nombre_but', '>', 10)
            ->get();

        // Joueurs attaquants OU milieux
        $attaquantsOuMilieux = Joueur::with('equipe')
            ->where('poste', 'Attaquant')
            ->orWhere('poste', 'Milieu')
            ->get();

        return view('statistics.joueurs-filtres', compact(
            'joueursPlusDe5Buts',
            'joueursCartesRouges',
            'joueurs20a30',
            'joueurs20a30PlusDe10Buts',
            'attaquantsOuMilieux'
        ));
    }

    // Équipes filtrées
    public function equipesFiltres()
    {
        // Équipes ayant au moins un joueur
        $equipesAvecJoueurs = Equipe::has('joueurs')->get();

        // Équipes ayant plus de 5 joueurs
        $equipesPlusDe5Joueurs = Equipe::has('joueurs', '>', 5)->get();

        // Équipes avec joueurs de moins de 20 ans
        $equipesJoueursMoinsDe20 = Equipe::whereHas('joueurs', function ($query) {
            $query->where('age', '<', 20);
        })->get();

        // Top 3 buteurs par équipe
        $equipesTop3Buteurs = Equipe::with(['joueurs' => function ($q) {
            $q->orderByDesc('nombre_but')->take(3);
        }])->get();

        return view('statistics.equipes-filtres', compact(
            'equipesAvecJoueurs',
            'equipesPlusDe5Joueurs',
            'equipesJoueursMoinsDe20',
            'equipesTop3Buteurs'
        ));
    }
}
