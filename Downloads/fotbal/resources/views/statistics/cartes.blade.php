<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Cartes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning mb-4">
        <div class="container">
            <a class="navbar-brand text-dark" href="/"><i class="fas fa-futbol"></i> Football Manager</a>
            <div class="navbar-nav">
                <a class="nav-link text-dark" href="{{ route('statistics.index') }}">← Retour</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4"><i class="fas fa-square text-warning"></i> Statistiques Cartes</h1>

        <div class="row">
            <!-- Cartes Jaunes -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <i class="fas fa-square"></i> Top 10 Cartes Jaunes
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Joueur</th>
                                    <th>Équipe</th>
                                    <th>Cartes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topCartesJaunes as $index => $joueur)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $joueur->nom_prenom }}</td>
                                        <td>{{ $joueur->equipe->nom ?? 'N/A' }}</td>
                                        <td><span class="badge bg-warning text-dark fs-6">{{ $joueur->carte_jaune }}</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Aucune donnée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Cartes Rouges -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <i class="fas fa-square"></i> Top 10 Cartes Rouges
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Joueur</th>
                                    <th>Équipe</th>
                                    <th>Cartes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topCartesRouges as $index => $joueur)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $joueur->nom_prenom }}</td>
                                        <td>{{ $joueur->equipe->nom ?? 'N/A' }}</td>
                                        <td><span class="badge bg-danger fs-6">{{ $joueur->carte_rouge }}</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Aucune donnée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
