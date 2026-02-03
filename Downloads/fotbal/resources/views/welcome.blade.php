<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <h1>Bienvenue sur le site de gestion de football</h1>
    <div class="links">
        <a href="{{ route('joueurs.index') }}">Voir les Joueurs</a>
        <a href="{{ route('equipes.index') }}">Voir les Equipes</a>
    </div>

    <style>
        /* Style global du body */
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Conteneur principal (card) */
        .container {
            text-align: center;
            background: white;
            padding: 80px 60px; /* Augmentation du padding pour card plus grande */
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15); /* Ombre plus marquée */
            max-width: 500px; /* Largeur maximale */
            width: 100%;
        }

        h1 {
            color: #333;
            margin-bottom: 40px; /* Plus d’espace sous le titre */
            font-size: 2.5rem; /* Titre plus grand */
        }

        a {
            display: inline-block;
            padding: 20px 40px; /* Bouton plus grand */
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 10px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        a:hover {
            background-color: #45a049;
            transform: scale(1.05); /* Effet légèrement zoom au hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue</h1>
        <a href="/equipes">Voir les equipes</a>
        <a href="/joueurs">Voir les joueurs</a>
    </div>
</body>
</html>