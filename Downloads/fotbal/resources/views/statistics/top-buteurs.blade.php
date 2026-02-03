<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Buteurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-futbol"></i> Football Manager</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('statistics.index') }}">← Retour</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4"><i class="fas fa-futbol"></i> Top Buteurs</h1>

        <!-- Meilleur Buteur -->
        @if($meilleurButeur)
        <div class="card mb-4 bg-success text-white">
            <div class="card-body text-center">
                <i class="fas fa-trophy fa-4x mb-3"></i>
                <h2>Meilleur Buteur</h2>
                <h1>{{ $meilleurButeur->nom_prenom }}</h1>
                <p class="mb-0">{{ $meilleurButeur->equipe->nom ?? 'Sans équipe' }}</p>
                <h1 class="display-1">{{ $meilleurButeur->nombre_but }}</h1>
                <p>buts</p>
            </div>
        </div>
        @endif

        <!-- Top 10 -->
        <div class="card">
            <div class="card-header bg-dark text-white">
                <i class="fas fa-list-ol"></i> Classement Top 10
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-success">
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
                                <td>
                                    @if($index == 0)
                                        <i class="fas fa-medal text-warning"></i>
                                    @elseif($index == 1)
                                        <i class="fas fa-medal text-secondary"></i>
                                    @elseif($index == 2)
                                        <i class="fas fa-medal" style="color: #cd7f32;"></i>
                                    @else
                                        {{ $index + 1 }}
                                    @endif
                                </td>
                                <td><strong>{{ $joueur->nom_prenom }}</strong></td>
                                <td>{{ $joueur->equipe->nom ?? 'N/A' }}</td>
                                <td>{{ $joueur->poste }}</td>
                                <td><span class="badge bg-success fs-5">{{ $joueur->nombre_but }}</span></td>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
