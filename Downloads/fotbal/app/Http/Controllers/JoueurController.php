<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;
use App\Models\Equipe;

class JoueurController extends Controller
{
    public function index()
    {
        $joueurs = Joueur::with('equipe')->get();
        return view('joueurs.index', compact('joueurs'));
    }

    public function create()
    {
        $equipes = Equipe::all();
        return view('joueurs.create', compact('equipes'));
    }

    public function store(Request $request)
    {
        Joueur::create($request->all());
        return redirect('/joueurs');
    }
}
