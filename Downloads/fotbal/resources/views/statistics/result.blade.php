<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Football Manager</a>
            <a class="btn btn-outline-light" href="{{ route('statistics.index') }}">← Retour</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-3">{{ $title }}</h2>
        <div class="alert alert-secondary">
            <strong>Code:</strong> <code>{{ $code }}</code>
        </div>

        @if($type == 'joueurs')
            <table class="table table-striped bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Âge</th>
                        <th>Poste</th>
                        <th>Buts</th>
                        <th>Cartes J</th>
                        <th>Cartes R</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $j)
                    <tr>
                        <td>{{ $j->nom_prenom }}</td>
                        <td>{{ $j->age }}</td>
                        <td>{{ $j->poste }}</td>
                        <td><span class="badge bg-success">{{ $j->nombre_but }}</span></td>
                        <td><span class="badge bg-warning text-dark">{{ $j->carte_jaune }}</span></td>
                        <td><span class="badge bg-danger">{{ $j->carte_rouge }}</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Aucun résultat</td></tr>
                    @endforelse
                </tbody>
            </table>

        @elseif($type == 'equipes')
            <table class="table table-striped bg-white">
                <thead class="table-dark">
                    <tr><th>Nom</th><th>Ville</th></tr>
                </thead>
                <tbody>
                    @forelse($data as $e)
                    <tr><td>{{ $e->nom }}</td><td>{{ $e->ville }}</td></tr>
                    @empty
                    <tr><td colspan="2" class="text-center">Aucun résultat</td></tr>
                    @endforelse
                </tbody>
            </table>

        @elseif($type == 'equipes_buts')
            <table class="table table-striped bg-white">
                <thead class="table-dark">
                    <tr><th>Équipe</th><th>Ville</th><th>Total Buts</th></tr>
                </thead>
                <tbody>
                    @forelse($data as $e)
                    <tr>
                        <td>{{ $e->nom }}</td>
                        <td>{{ $e->ville }}</td>
                        <td><span class="badge bg-primary">{{ $e->joueurs_sum_nombre_but ?? 0 }}</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center">Aucun résultat</td></tr>
                    @endforelse
                </tbody>
            </table>

        @elseif($type == 'equipes_joueurs')
            @forelse($data as $e)
            <div class="card mb-3">
                <div class="card-header bg-dark text-white">{{ $e->nom }} - {{ $e->ville }}</div>
                <ul class="list-group list-group-flush">
                    @forelse($e->joueurs as $j)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $j->nom_prenom }}</span>
                        <span class="badge bg-success">{{ $j->nombre_but }} buts</span>
                    </li>
                    @empty
                    <li class="list-group-item text-muted">Aucun joueur</li>
                    @endforelse
                </ul>
            </div>
            @empty
            <p>Aucune équipe</p>
            @endforelse

        @elseif($type == 'simple')
            <table class="table table-striped bg-white">
                <tbody>
                    @foreach($data as $row)
                        @foreach($row as $key => $value)
                        <tr><th>{{ $key }}</th><td>{{ $value }}</td></tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @endif

        <p class="text-muted mt-3">Total: {{ $data->count() }} résultat(s)</p>
    </div>
</body>
</html>
