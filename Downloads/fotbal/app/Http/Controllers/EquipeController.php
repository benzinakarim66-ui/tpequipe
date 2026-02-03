<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;

class EquipeController extends Controller
{
     public function index()
    {
        $equipes = Equipe::all();
        return view('equipes.index', compact('equipes'));
    }

    public function show($id)
    {
         $equipe = Equipe::with('joueurs')->find($id);
        return view('equipes.show', compact('equipe'));
    }

    public function create()
    {
    return view('equipes.create');
    }

    public function store(Request $request)
    { 
    Equipe::create($request->all()); 
    return redirect('/equipes');
    }
}
