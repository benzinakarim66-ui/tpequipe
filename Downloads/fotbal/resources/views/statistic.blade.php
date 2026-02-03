<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Football Manager</a>
            <a class="btn btn-outline-light" href="{{ route('statistics.index') }}">Menu Statistiques</a>
        </div>
    </nav>

    <div class="container">

        {{-- Boutons du menu principal --}}
        @if(!isset($joueurs) && !isset($equipes) && !isset($joueur) && !isset($avgAge) && !isset($topJoueur))
        <h1 class="mb-4">Statistiques</h1>
        
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">Relations</div>
            <div class="card-body">
                <a href="{{ route('statistics.joueursEquipe', 1) }}" class="btn btn-primary m-1">Joueurs équipe (id=1)</a>
                <a href="{{ route('statistics.equipeJoueur', 1) }}" class="btn btn-primary m-1">Équipe joueur (id=1)</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-success text-white">Filtres (where)</div>
            <div class="card-body">
                <a href="{{ route('statistics.joueursPlusDe5Buts') }}" class="btn btn-success m-1">Joueurs > 5 buts</a>
                <a href="{{ route('statistics.joueursCartesRouges') }}" class="btn btn-success m-1">Joueurs cartes rouges</a>
                <a href="{{ route('statistics.joueursParPoste', 'Attaquant') }}" class="btn btn-success m-1">Attaquants</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-warning text-dark">Filtres combinés</div>
            <div class="card-body">
                <a href="{{ route('statistics.joueurs20a30') }}" class="btn btn-warning m-1">Joueurs 20-30 ans</a>
                <a href="{{ route('statistics.joueurs20a30PlusDe10Buts') }}" class="btn btn-warning m-1">20-30 ans + >10 buts</a>
                <a href="{{ route('statistics.joueursAttaquantsOuMilieux') }}" class="btn btn-warning m-1">Attaquants OU Milieux</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-info text-white">Tri & Limitation</div>
            <div class="card-body">
                <a href="{{ route('statistics.joueursTriesParButs') }}" class="btn btn-info m-1">Triés par buts</a>
                <a href="{{ route('statistics.top5Buteurs') }}" class="btn btn-info m-1">Top 5 buteurs</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">Relations (has/whereHas)</div>
            <div class="card-body">
                <a href="{{ route('statistics.equipesAvecJoueurs') }}" class="btn btn-secondary m-1">Équipes avec joueurs</a>
                <a href="{{ route('statistics.equipesPlusDe5Joueurs') }}" class="btn btn-secondary m-1">Équipes > 5 joueurs</a>
                <a href="{{ route('statistics.equipesJoueursMoinsDe20') }}" class="btn btn-secondary m-1">Équipes joueurs < 20 ans</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-danger text-white">Agrégations</div>
            <div class="card-body">
                <a href="{{ route('statistics.totalButsParEquipe') }}" class="btn btn-danger m-1">Buts par équipe</a>
                <a href="{{ route('statistics.equipesTriesParButs') }}" class="btn btn-danger m-1">Équipes triées par buts</a>
                <a href="{{ route('statistics.moyenneAge') }}" class="btn btn-danger m-1">Moyenne âge</a>
                <a href="{{ route('statistics.topJoueur') }}" class="btn btn-danger m-1">Top joueur</a>
                <a href="{{ route('statistics.top3ButeursParEquipe') }}" class="btn btn-danger m-1">Top 3 par équipe</a>
            </div>
        </div>
        @endif

        {{-- Affichage joueurs --}}
        @if(isset($joueurs))
        <h2>Résultat ({{ $joueurs->count() }} joueurs)</h2>
        <table class="table table-striped bg-white">
            <thead class="table-dark">
                <tr><th>Nom</th><th>Âge</th><th>Poste</th><th>Buts</th><th>C.Jaunes</th><th>C.Rouges</th></tr>
            </thead>
            <tbody>
                @foreach($joueurs as $j)
                <tr>
                    <td>{{ $j->nom_prenom }}</td>
                    <td>{{ $j->age }}</td>
                    <td>{{ $j->poste }}</td>
                    <td>{{ $j->nombre_but }}</td>
                    <td>{{ $j->carte_jaune }}</td>
                    <td>{{ $j->carte_rouge }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        {{-- Affichage équipes --}}
        @if(isset($equipes))
        <h2>Résultat ({{ $equipes->count() }} équipes)</h2>
        <table class="table table-striped bg-white">
            <thead class="table-dark">
                <tr><th>Nom</th><th>Ville</th><th>Buts</th></tr>
            </thead>
            <tbody>
                @foreach($equipes as $e)
                <tr>
                    <td>{{ $e->nom }}</td>
                    <td>{{ $e->ville }}</td>
                    <td>{{ $e->joueurs_sum_nombre_but ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        {{-- Affichage joueur seul --}}
        @if(isset($joueur))
        <h2>Joueur: {{ $joueur->nom_prenom }}</h2>
        <p>Équipe: <strong>{{ $nomEquipe }}</strong></p>
        @endif

        {{-- Moyenne âge --}}
        @if(isset($avgAge))
        <h2>Moyenne d'âge: {{ number_format($avgAge, 2) }} ans</h2>
        @endif

        {{-- Top joueur --}}
        @if(isset($topJoueur))
        <h2>Top Joueur: {{ $topJoueur->nom_prenom }}</h2>
        <p>Buts: <strong>{{ $topJoueur->nombre_but }}</strong></p>
        @endif

    </div>
</body>
</html>
