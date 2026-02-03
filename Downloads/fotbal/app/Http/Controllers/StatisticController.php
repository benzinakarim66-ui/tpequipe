<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        return view('statistic');
    }

    public function joueursEquipe($id)
    {
        $equipe = Equipe::with('joueurs')->find($id);
        $joueurs = $equipe->joueurs;
        return view('statistic', compact('joueurs', 'equipe'));
    }

    public function equipeJoueur($id)
    {
        $joueur = Joueur::with('equipe')->find($id);
        $nomEquipe = $joueur->equipe->nom;
        return view('statistic', compact('joueur', 'nomEquipe'));
    }

    public function joueursPlusDe5Buts()
    {
        $joueurs = Joueur::where('nombre_but', '>', 5)->get();
        return view('statistic', compact('joueurs'));
    }

    public function joueursCartesRouges()
    {
        $joueurs = Joueur::where('carte_rouge', '>', 0)->get();
        return view('statistic', compact('joueurs'));
    }

    public function joueursParPoste($poste)
    {
        $joueurs = Joueur::where('poste', $poste)->get();
        return view('statistic', compact('joueurs'));
    }

    public function joueurs20a30()
    {
        $joueurs = Joueur::whereBetween('age', [20, 30])->get();
        return view('statistic', compact('joueurs'));
    }

    public function joueurs20a30PlusDe10Buts()
    {
        $joueurs = Joueur::whereBetween('age', [20, 30])->where('nombre_but', '>', 10)->get();
        return view('statistic', compact('joueurs'));
    }

    public function joueursAttaquantsOuMilieux()
    {
        $joueurs = Joueur::where('poste', 'Attaquant')->orWhere('poste', 'Milieu')->get();
        return view('statistic', compact('joueurs'));
    }

    public function joueursTriesParButs()
    {
        $joueurs = Joueur::orderByDesc('nombre_but')->get();
        return view('statistic', compact('joueurs'));
    }

    public function top5Buteurs()
    {
        $joueurs = Joueur::orderByDesc('nombre_but')->take(5)->get();
        return view('statistic', compact('joueurs'));
    }

    public function equipesAvecJoueurs()
    {
        $equipes = Equipe::has('joueurs')->get();
        return view('statistic', compact('equipes'));
    }

    public function equipesPlusDe5Joueurs()
    {
        $equipes = Equipe::has('joueurs', '>', 5)->get();
        return view('statistic', compact('equipes'));
    }

    public function equipesJoueursMoinsDe20()
    {
        $equipes = Equipe::whereHas('joueurs', function ($query) {
            $query->where('age', '<', 20);
        })->get();
        return view('statistic', compact('equipes'));
    }

    public function totalButsParEquipe()
    {
        $equipes = Equipe::withSum('joueurs', 'nombre_but')->get();
        return view('statistic', compact('equipes'));
    }

    public function equipesTriesParButs()
    {
        $equipes = Equipe::withSum('joueurs', 'nombre_but')->orderByDesc('joueurs_sum_nombre_but')->get();
        return view('statistic', compact('equipes'));
    }

    public function moyenneAge()
    {
        $avgAge = Joueur::avg('age');
        return view('statistic', compact('avgAge'));
    }

    public function topJoueur()
    {
        $topJoueur = Joueur::orderByDesc('nombre_but')->first();
        return view('statistic', compact('topJoueur'));
    }

    public function top3ButeursParEquipe()
    {
        $equipes = Equipe::with(['joueurs' => function ($q) {
            $q->orderByDesc('nombre_but')->take(3);
        }])->get();
        return view('statistic', compact('equipes'));
    }
}
