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
            <div class="navbar-nav flex-row">
                <a class="nav-link text-white me-3" href="{{ route('equipes.index') }}">Équipes</a>
                <a class="nav-link text-white" href="{{ route('joueurs.index') }}">Joueurs</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Statistiques - Requêtes Eloquent</h1>

        <!-- Relations -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Récupérer les relations</div>
            <div class="card-body">
                <a href="{{ route('statistics.joueursEquipe', 1) }}" class="btn btn-outline-primary m-1">
                    Joueurs d'une équipe (id=1)
                </a>
                <a href="{{ route('statistics.equipeJoueur', 1) }}" class="btn btn-outline-primary m-1">
                    Équipe d'un joueur (id=1)
                </a>
            </div>
        </div>

        <!-- Filtres simples -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Filtres simples (where)</div>
            <div class="card-body">
                <a href="{{ route('statistics.joueursPlusDe5Buts') }}" class="btn btn-outline-success m-1">
                    Joueurs > 5 buts
                </a>
                <a href="{{ route('statistics.joueursCartesRouges') }}" class="btn btn-outline-success m-1">
                    Joueurs avec cartes rouges
                </a>
                <a href="{{ route('statistics.joueursParPoste', 'Attaquant') }}" class="btn btn-outline-success m-1">
                    Joueurs Attaquants
                </a>
            </div>
        </div>

        <!-- Filtres combinés -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">Filtres combinés (AND / OR)</div>
            <div class="card-body">
                <a href="{{ route('statistics.joueurs20a30') }}" class="btn btn-outline-warning m-1">
                    Joueurs 20-30 ans
                </a>
                <a href="{{ route('statistics.joueurs20a30PlusDe10Buts') }}" class="btn btn-outline-warning m-1">
                    Joueurs 20-30 ans + >10 buts
                </a>
                <a href="{{ route('statistics.joueursAttaquantsOuMilieux') }}" class="btn btn-outline-warning m-1">
                    Attaquants OU Milieux
                </a>
            </div>
        </div>

        <!-- Tri & Limitation -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">Tri & Limitation</div>
            <div class="card-body">
                <a href="{{ route('statistics.joueursTriesParButs') }}" class="btn btn-outline-info m-1">
                    Joueurs triés par buts
                </a>
                <a href="{{ route('statistics.top5Buteurs') }}" class="btn btn-outline-info m-1">
                    Top 5 buteurs
                </a>
            </div>
        </div>

        <!-- Relations avec filtres -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Exploiter les relations (has / whereHas)</div>
            <div class="card-body">
                <a href="{{ route('statistics.equipesAvecJoueurs') }}" class="btn btn-outline-secondary m-1">
                    Équipes avec joueurs
                </a>
                <a href="{{ route('statistics.equipesPlusDe5Joueurs') }}" class="btn btn-outline-secondary m-1">
                    Équipes > 5 joueurs
                </a>
                <a href="{{ route('statistics.equipesJoueursMoinsDe20') }}" class="btn btn-outline-secondary m-1">
                    Équipes avec joueurs < 20 ans
                </a>
            </div>
        </div>

        <!-- Agrégations -->
        <div class="card mb-4">
            <div class="card-header bg-danger text-white">Comptage & Agrégations</div>
            <div class="card-body">
                <a href="{{ route('statistics.totalButsParEquipe') }}" class="btn btn-outline-danger m-1">
                    Total buts par équipe
                </a>
                <a href="{{ route('statistics.equipesTriesParButs') }}" class="btn btn-outline-danger m-1">
                    Équipes triées par buts
                </a>
                <a href="{{ route('statistics.moyenneAge') }}" class="btn btn-outline-danger m-1">
                    Moyenne d'âge
                </a>
                <a href="{{ route('statistics.topJoueur') }}" class="btn btn-outline-danger m-1">
                    Joueur avec le + de buts
                </a>
                <a href="{{ route('statistics.top3ButeursParEquipe') }}" class="btn btn-outline-danger m-1">
                    Top 3 buteurs par équipe
                </a>
            </div>
        </div>
    </div>
</body>
</html>
