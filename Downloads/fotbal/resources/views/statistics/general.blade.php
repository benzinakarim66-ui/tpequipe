<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Générales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-futbol"></i> Football Manager</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('statistics.index') }}">← Retour</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4"><i class="fas fa-chart-pie"></i> Statistiques Générales</h1>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h6>Total Équipes</h6>
                        <h1>{{ $totalEquipes }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-success text-white h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-running fa-3x mb-3"></i>
                        <h6>Total Joueurs</h6>
                        <h1>{{ $totalJoueurs }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-info text-white h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-futbol fa-3x mb-3"></i>
                        <h6>Total Buts</h6>
                        <h1>{{ $totalButs ?? 0 }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-warning text-dark h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-square fa-3x mb-3"></i>
                        <h6>Cartes Jaunes</h6>
                        <h1>{{ $totalCartesJaunes ?? 0 }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-square fa-3x mb-3"></i>
                        <h6>Cartes Rouges</h6>
                        <h1>{{ $totalCartesRouges ?? 0 }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-secondary text-white h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-birthday-cake fa-3x mb-3"></i>
                        <h6>Âge Moyen</h6>
                        <h1>{{ number_format($moyenneAge ?? 0, 1) }} <small>ans</small></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
