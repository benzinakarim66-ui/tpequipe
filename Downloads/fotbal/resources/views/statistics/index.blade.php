<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .stat-card {
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            font-size: 2.5rem;
            opacity: 0.8;
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
        <h1 class="mb-4"><i class="fas fa-chart-bar"></i> Statistiques</h1>

        <!-- Cartes de statistiques générales -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card stat-card bg-primary text-white h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-subtitle mb-2">Total Équipes</h6>
                            <h2 class="card-title mb-0">{{ $totalEquipes }}</h2>
                        </div>
                        <i class="fas fa-users stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card stat-card bg-success text-white h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-subtitle mb-2">Total Joueurs</h6>
                            <h2 class="card-title mb-0">{{ $totalJoueurs }}</h2>
                        </div>
                        <i class="fas fa-running stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card stat-card bg-info text-white h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-subtitle mb-2">Total Buts</h6>
                            <h2 class="card-title mb-0">{{ $totalButs ?? 0 }}</h2>
                        </div>
                        <i class="fas fa-futbol stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card stat-card bg-warning text-dark h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-subtitle mb-2">Cartes Jaunes</h6>
                            <h2 class="card-title mb-0">{{ $totalCartesJaunes ?? 0 }}</h2>
                        </div>
                        <i class="fas fa-square stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card stat-card bg-danger text-white h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-subtitle mb-2">Cartes Rouges</h6>
                            <h2 class="card-title mb-0">{{ $totalCartesRouges ?? 0 }}</h2>
                        </div>
                        <i class="fas fa-square stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card stat-card bg-secondary text-white h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-subtitle mb-2">Âge Moyen</h6>
                            <h2 class="card-title mb-0">{{ number_format($moyenneAge ?? 0, 1) }} ans</h2>
                        </div>
                        <i class="fas fa-birthday-cake stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Meilleur Buteur -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-trophy"></i> Meilleur Buteur
                    </div>
                    <div class="card-body text-center">
                        @if($meilleurButeur)
                            <h3>{{ $meilleurButeur->nom_prenom }}</h3>
                            <p class="text-muted">{{ $meilleurButeur->equipe->nom ?? 'Sans équipe' }}</p>
                            <h1 class="text-primary">{{ $meilleurButeur->nombre_but }} <small>buts</small></h1>
                        @else
                            <p class="text-muted">Aucun joueur enregistré</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Équipe avec le plus de buts -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-medal"></i> Équipe la plus prolifique
                    </div>
                    <div class="card-body text-center">
                        @if($equipePlusButs)
                            <h3>{{ $equipePlusButs->nom }}</h3>
                            <p class="text-muted">{{ $equipePlusButs->ville }}</p>
                            <h1 class="text-success">{{ $equipePlusButs->joueurs_sum_nombre_but ?? 0 }} <small>buts</small></h1>
                        @else
                            <p class="text-muted">Aucune équipe enregistrée</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Top 5 Buteurs -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <i class="fas fa-list-ol"></i> Top 5 Buteurs
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Joueur</th>
                            <th>Équipe</th>
                            <th>Poste</th>
                            <th>Buts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topButeurs as $index => $joueur)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $joueur->nom_prenom }}</td>
                                <td>{{ $joueur->equipe->nom ?? 'N/A' }}</td>
                                <td>{{ $joueur->poste }}</td>
                                <td><span class="badge bg-primary">{{ $joueur->nombre_but }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Aucun joueur</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Statistiques par équipe -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <i class="fas fa-table"></i> Statistiques par Équipe
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Équipe</th>
                            <th>Ville</th>
                            <th>Joueurs</th>
                            <th>Buts</th>
                            <th><i class="fas fa-square text-warning"></i> Jaunes</th>
                            <th><i class="fas fa-square text-danger"></i> Rouges</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($statsParEquipe as $equipe)
                            <tr>
                                <td><strong>{{ $equipe->nom }}</strong></td>
                                <td>{{ $equipe->ville }}</td>
                                <td>{{ $equipe->joueurs_count }}</td>
                                <td><span class="badge bg-primary">{{ $equipe->joueurs_sum_nombre_but ?? 0 }}</span></td>
                                <td><span class="badge bg-warning text-dark">{{ $equipe->joueurs_sum_carte_jaune ?? 0 }}</span></td>
                                <td><span class="badge bg-danger">{{ $equipe->joueurs_sum_carte_rouge ?? 0 }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Aucune équipe</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Répartition par poste -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <i class="fas fa-chart-pie"></i> Répartition par Poste
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($repartitionPostes as $poste)
                        <div class="col-md-3 mb-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5>{{ $poste->poste }}</h5>
                                    <h3 class="text-primary">{{ $poste->total }}</h3>
                                    <small class="text-muted">joueurs</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">Aucune donnée disponible</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
