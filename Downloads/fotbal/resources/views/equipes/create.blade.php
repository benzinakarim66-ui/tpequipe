<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ajouter une équipe</h2>

<form method="POST" action="{{ route('equipes.store') }}">
    @csrf

    <label>Nom :</label><br>
    <input type="text" name="nom"><br><br>

    <label>Ville :</label><br>
    <input type="text" name="ville"><br><br>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>