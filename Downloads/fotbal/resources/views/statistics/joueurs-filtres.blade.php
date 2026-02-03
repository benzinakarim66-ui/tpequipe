<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joueurs Filtrés</title>
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
        <h1 class="mb-4"><i class="fas fa-filter"></i> Joueurs Filtrés</h1>

        <!-- Joueurs avec plus de 5 buts -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-futbol"></i> Joueurs ayant plus de 5 buts
                <code class="float-end text-light">Joueur::where('nombre_but', '>', 5)->get()</code>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead><tr><th>Nom</th><th>Équipe</th><th>Buts</th></tr></thead>
                    <tbody>
                        @forelse($joueursPlusDe5Buts as $j)
                        <tr><td>{{ $j->nom_prenom }}</td><td>{{ $j->equipe->nom ?? 'N/A' }}</td><td><span class="badge bg-success">{{ $j->nombre_but }}</span></td></tr>
                        @empty
                        <tr><td colspan="3" class="text-center">Aucun joueur</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Joueurs avec cartes rouges -->
        <div class="card mb-4">
            <div class="card-header bg-danger text-white">
                <i class="fas fa-square"></i> Joueurs ayant au moins 1 carte rouge
                <code class="float-end text-light">Joueur::where('carte_rouge', '>', 0)->get()</code>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead><tr><th>Nom</th><th>Équipe</th><th>Cartes Rouges</th></tr></thead>
                    <tbody>
                        @forelse($joueursCartesRouges as $j)
                        <tr><td>{{ $j->nom_prenom }}</td><td>{{ $j->equipe->nom ?? 'N/A' }}</td><td><span class="badge bg-danger">{{ $j->carte_rouge }}</span></td></tr>
                        @empty
                        <tr><td colspan="3" class="text-center">Aucun joueur</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Joueurs 20-30 ans -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <i class="fas fa-users"></i> Joueurs entre 20 et 30 ans
                <code class="float-end text-light">Joueur::whereBetween('age', [20, 30])->get()</code>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead><tr><th>Nom</th><th>Âge</th><th>Équipe</th><th>Poste</th></tr></thead>
                    <tbody>
                        @forelse($joueurs20a30 as $j)
                        <tr><td>{{ $j->nom_prenom }}</td><td>{{ $j->age }}</td><td>{{ $j->equipe->nom ?? 'N/A' }}</td><td>{{ $j->poste }}</td></tr>
                        @empty
                        <tr><td colspan="4" class="text-center">Aucun joueur</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Joueurs 20-30 ans avec plus de 10 buts -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-star"></i> Joueurs 20-30 ans avec plus de 10 buts
                <code class="float-end text-light">whereBetween('age', [20, 30])->where('nombre_but', '>', 10)</code>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead><tr><th>Nom</th><th>Âge</th><th>Buts</th><th>Équipe</th></tr></thead>
                    <tbody>
                        @forelse($joueurs20a30PlusDe10Buts as $j)
                        <tr><td>{{ $j->nom_prenom }}</td><td>{{ $j->age }}</td><td><span class="badge bg-primary">{{ $j->nombre_but }}</span></td><td>{{ $j->equipe->nom ?? 'N/A' }}</td></tr>
                        @empty
                        <tr><td colspan="4" class="text-center">Aucun joueur</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Attaquants ou Milieux -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                <i class="fas fa-running"></i> Joueurs Attaquants OU Milieux
                <code class="float-end">where('poste', 'Attaquant')->orWhere('poste', 'Milieu')</code>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead><tr><th>Nom</th><th>Poste</th><th>Équipe</th><th>Buts</th></tr></thead>
                    <tbody>
                        @forelse($attaquantsOuMilieux as $j)
                        <tr><td>{{ $j->nom_prenom }}</td><td><span class="badge bg-warning text-dark">{{ $j->poste }}</span></td><td>{{ $j->equipe->nom ?? 'N/A' }}</td><td>{{ $j->nombre_but }}</td></tr>
                        @empty
                        <tr><td colspan="4" class="text-center">Aucun joueur</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
