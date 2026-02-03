<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques par Poste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-futbol"></i> Football Manager</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('statistics.index') }}">← Retour</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4"><i class="fas fa-running"></i> Répartition par Poste</h1>

        <div class="row">
            @forelse($repartitionPostes as $poste)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            @switch($poste->poste)
                                @case('Gardien')
                                    <i class="fas fa-hand-paper fa-4x text-primary mb-3"></i>
                                    @break
                                @case('Défenseur')
                                    <i class="fas fa-shield-alt fa-4x text-success mb-3"></i>
                                    @break
                                @case('Milieu')
                                    <i class="fas fa-arrows-alt fa-4x text-warning mb-3"></i>
                                    @break
                                @case('Attaquant')
                                    <i class="fas fa-futbol fa-4x text-danger mb-3"></i>
                                    @break
                                @default
                                    <i class="fas fa-user fa-4x text-secondary mb-3"></i>
                            @endswitch
                            <h4>{{ $poste->poste }}</h4>
                            <h1 class="text-primary">{{ $poste->total }}</h1>
                            <p class="text-muted">joueurs</p>
                            <hr>
                            <p><strong>{{ $poste->total_buts ?? 0 }}</strong> buts marqués</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Aucune donnée disponible
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
