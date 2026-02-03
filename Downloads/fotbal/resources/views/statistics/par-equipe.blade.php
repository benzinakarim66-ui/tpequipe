<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques par Équipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info mb-4">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-futbol"></i> Football Manager</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('statistics.index') }}">← Retour</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4"><i class="fas fa-users"></i> Statistiques par Équipe</h1>

        <!-- Équipe la plus prolifique -->
        @if($equipePlusButs)
        <div class="card mb-4 bg-info text-white">
            <div class="card-body text-center">
                <i class="fas fa-trophy fa-3x mb-3"></i>
                <h4>Équipe la plus prolifique</h4>
                <h2>{{ $equipePlusButs->nom }}</h2>
                <p>{{ $equipePlusButs->ville }}</p>
                <h1 class="display-3">{{ $equipePlusButs->joueurs_sum_nombre_but ?? 0 }} <small>buts</small></h1>
            </div>
        </div>
        @endif

        <!-- Tableau détaillé -->
        <div class="card">
            <div class="card-header bg-dark text-white">
                <i class="fas fa-table"></i> Détails par Équipe
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-info">
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
                                <td><span class="badge bg-secondary">{{ $equipe->joueurs_count }}</span></td>
                                <td><span class="badge bg-success">{{ $equipe->joueurs_sum_nombre_but ?? 0 }}</span></td>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
