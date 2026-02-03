<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ajouter un joueur</h2>

<form method="POST" action="{{ route('joueurs.store') }}">
    @csrf

    <label>Nom & Prénom :</label><br>
    <input type="text" name="nom_prenom"><br><br>

    <label>age :</label><br>
    <input type="number" name="age"><br><br>

    <label>Poste :</label><br>
    <input type="text" name="poste"><br><br>

    <label>Buts :</label><br>
    <input type="number" name="nombre_but"><br><br>

    <label>Cartes jaunes :</label><br>
    <input type="number" name="carte_jaune"><br><br>

    <label>Cartes rouges :</label><br>
    <input type="number" name="carte_rouge"><br><br>

    <label>Équipe :</label><br>
    <select name="equipe_id">
        @foreach($equipes as $equipe)
            <option value="{{ $equipe->id }}">
                {{ $equipe->nom }} - {{ $equipe->ville }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>