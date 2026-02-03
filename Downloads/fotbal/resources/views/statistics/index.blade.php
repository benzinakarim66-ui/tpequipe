<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques - Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .stat-card {
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            height: 200px;
        }
        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .stat-icon {
            font-size: 4rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-futbol"></i> Football Manager</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('equipes.index') }}">Équipes</a>
                <a class="nav-link" href="{{ route('joueurs.index') }}">Joueurs</a>
                <a class="nav-link active" href="{{ route('statistics.index') }}">Statistiques</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4 text-center"><i class="fas fa-chart-bar"></i> Statistiques</h1>
        <p class="text-center text-muted mb-5">Choisissez une catégorie pour voir les statistiques</p>

        <div class="row">
            <!-- Statistiques Générales -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('statistics.general') }}" class="text-decoration-none">
                    <div class="card stat-card bg-primary text-white text-center d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <i class="fas fa-chart-pie stat-icon"></i>
                            <h4>Statistiques Générales</h4>
                            <p class="mb-0">Totaux et moyennes</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Top Buteurs -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('statistics.topButeurs') }}" class="text-decoration-none">
                    <div class="card stat-card bg-success text-white text-center d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <i class="fas fa-futbol stat-icon"></i>
                            <h4>Top Buteurs</h4>
                            <p class="mb-0">Classement des meilleurs buteurs</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Cartes -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('statistics.cartes') }}" class="text-decoration-none">
                    <div class="card stat-card bg-warning text-dark text-center d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <i class="fas fa-square stat-icon"></i>
                            <h4>Cartes</h4>
                            <p class="mb-0">Jaunes et rouges</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Par Équipe -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('statistics.parEquipe') }}" class="text-decoration-none">
                    <div class="card stat-card bg-info text-white text-center d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <i class="fas fa-users stat-icon"></i>
                            <h4>Par Équipe</h4>
                            <p class="mb-0">Statistiques détaillées par équipe</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Par Poste -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('statistics.parPoste') }}" class="text-decoration-none">
                    <div class="card stat-card bg-secondary text-white text-center d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <i class="fas fa-running stat-icon"></i>
                            <h4>Par Poste</h4>
                            <p class="mb-0">Répartition des joueurs</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Joueurs Filtrés -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('statistics.joueursFiltres') }}" class="text-decoration-none">
                    <div class="card stat-card bg-dark text-white text-center d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <i class="fas fa-filter stat-icon"></i>
                            <h4>Joueurs Filtrés</h4>
                            <p class="mb-0">where, whereBetween, orWhere</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Équipes Filtrées -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('statistics.equipesFiltres') }}" class="text-decoration-none">
                    <div class="card stat-card bg-danger text-white text-center d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <i class="fas fa-layer-group stat-icon"></i>
                            <h4>Équipes Filtrées</h4>
                            <p class="mb-0">has, whereHas, with</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
