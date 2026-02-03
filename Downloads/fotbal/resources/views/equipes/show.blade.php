<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <a href="/equipes">
        <button>Retour à la liste </button>
    </a>

<h2>Joueurs de {{ $equipe->nom }}</h2>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>Nom</th>
    <th>Âge</th>
    <th>Poste</th>
    <th>Buts</th>
    <th>Cartes jaunes</th>
    <th>Cartes rouges</th>
</tr>


    @foreach($equipe->joueurs as $joueur)
    <tr>
       <tr>
    <td>{{ $joueur->nom_prenom }}</td>
    <td>{{ $joueur->age }}</td>
    <td>{{ $joueur->poste }}</td>
    <td>{{ $joueur->nombre_but }}</td>
    <td>{{ $joueur->carte_jaune }}</td>
    <td>{{ $joueur->carte_rouge }}</td>
</tr>

    </tr>
    @endforeach
</table>
</body>
</html>
