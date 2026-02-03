<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Liste des joueurs</h2>

<p>
    <a href="{{ route('joueurs.create') }}">
        <button>Ajouter un joueur</button>
    </a>
</p>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Nom & Prénom</th>
        <th>Âge</th>
        <th>Poste</th>
        <th>Buts</th>
        <th>Équipe</th>
        <th>Ville</th>
    </tr>

    @foreach($joueurs as $joueur)
    <tr>
        <td>{{ $joueur->nom_prenom }}</td>
        <td>{{ $joueur->age }} ans</td>
        <td>{{ $joueur->poste }}</td>
        <td>{{ $joueur->nombre_but }}</td>
        <td>{{ $joueur->equipe->nom }}</td>
        <td>{{ $joueur->equipe->ville }}</td>
    </tr>
    @endforeach
</table>

<p>
    <a href="{{ route('equipes.index') }}">
        <button> liste des équipes</button>
    </a>
</p>

</body>
</html>