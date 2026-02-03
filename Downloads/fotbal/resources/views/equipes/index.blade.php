<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des équipes</title>
</head>
<body>

<h2>Liste des équipes</h2>

<a href="{{ route('equipes.create') }}">
        <button>Ajouter une équipe</button>
</a>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Nom</th>
        <th>Ville</th>
        <th>Action</th>
    </tr>

    @foreach($equipes as $equipe)
    <tr>
        <td>{{ $equipe->nom }}</td>
        <td>{{ $equipe->ville }}</td>
        <td>
            <a href="{{ route('equipes.show', $equipe->id) }}">Voir joueurs</a>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>
