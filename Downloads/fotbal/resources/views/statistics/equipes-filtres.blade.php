<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipes Filtrées</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-futbol"></i> Football Manager</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('statistics.index') }}">← Retour</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4"><i class="fas fa-filter"></i> Équipes Filtrées</h1>

        <!-- Équipes avec joueurs -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-users"></i> Équipes ayant au moins un joueur
                <code class="float-end text-light">Equipe::has('joueurs')->get()</code>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($equipesAvecJoueurs as $e)
                    <div class="col-md-3 mb-2">
                        <div class="alert alert-primary mb-0">{{ $e->nom }} - {{ $e->ville }}</div>
                    </div>
                    @empty
                    <p class="text-center">Aucune équipe</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Équipes avec plus de 5 joueurs -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-user-friends"></i> Équipes ayant plus de 5 joueurs
                <code class="float-end text-light">Equipe::has('joueurs', '>', 5)->get()</code>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($equipesPlusDe5Joueurs as $e)
                    <div class="col-md-3 mb-2">
                        <div class="alert alert-success mb-0">{{ $e->nom }}</div>
                    </div>
                    @empty
                    <p class="text-center text-muted">Aucune équipe avec plus de 5 joueurs</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Équipes avec joueurs moins de 20 ans -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <i class="fas fa-child"></i> Équipes avec joueurs de moins de 20 ans
                <code class="float-end text-light">Equipe::whereHas('joueurs', fn($q) => $q->where('age', '<', 20))</code>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($equipesJoueursMoinsDe20 as $e)
                    <div class="col-md-3 mb-2">
                        <div class="alert alert-info mb-0">{{ $e->nom }}</div>
                    </div>
                    @empty
                    <p class="text-center text-muted">Aucune équipe avec joueurs < 20 ans</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Top 3 buteurs par équipe -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                <i class="fas fa-trophy"></i> Top 3 buteurs par équipe
                <code class="float-end">Equipe::with(['joueurs' => fn($q) => $q->orderByDesc('nombre_but')->take(3)])</code>
            </div>
            <div class="card-body">
                @forelse($equipesTop3Buteurs as $e)
                <div class="card mb-3">
                    <div class="card-header"><strong>{{ $e->nom }}</strong> - {{ $e->ville }}</div>
                    <ul class="list-group list-group-flush">
                        @forelse($e->joueurs as $index => $j)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>
                                @if($index == 0) 🥇 @elseif($index == 1) 🥈 @elseif($index == 2) 🥉 @endif
                                {{ $j->nom_prenom }}
                            </span>
                            <span class="badge bg-warning text-dark">{{ $j->nombre_but }} buts</span>
                        </li>
                        @empty
                        <li class="list-group-item text-muted">Aucun joueur</li>
                        @endforelse
                    </ul>
                </div>
                @empty
                <p class="text-center">Aucune équipe</p>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
