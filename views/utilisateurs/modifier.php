<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <style>
        /* CSS pour le formulaire de modification d'utilisateur */
        .container {
            max-width: 800px; /* Largeur maximale du conteneur */
            margin: 0 auto; /* Centrer horizontalement */
            padding: 20px; /* Espacement interne */
            border: 1px solid #ccc; /* Bordure grise */
            border-radius: 8px; /* Coins arrondis */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Légère ombre */
           
            
        }

        h2 {
            margin-bottom: 20px; /* Espacement en dessous du titre */
            font-size: 24px; /* Taille de police du titre */
        }

        .form-group {
            margin-bottom: 20px; /* Espacement entre les champs */
        }

        label {
            font-weight: bold; /* Texte en gras pour les étiquettes */
        }

        .form-control {
            width: 100%; /* Largeur pleine pour les champs */
            padding: 10px; /* Espacement interne */
            border: 1px solid #ccc; /* Bordure grise */
            border-radius: 4px; /* Coins arrondis */
        }

        .btn-primary {
            display: inline-block; /* Affichage en ligne */
            padding: 10px 20px; /* Espacement interne */
            background-color: #303e50;
            color: #fff; /* Couleur du texte blanc */
            border: none; /* Suppression de la bordure */
            border-radius: 4px; /* Coins arrondis */
            font-size: 16px; /* Taille de police */
            cursor: pointer; /* Curseur pointeur au survol */
            transition: background-color 0.3s ease; /* Animation de transition */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Couleur de fond au survol */
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Modifier Utilisateur</h2>
    <form method="post" action="<?= URI . 'utilisateurs/mettreAJour/' . $utilisateur->id_utilisateur; ?>">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($utilisateur->nom); ?>" required />
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($utilisateur->email); ?>" required />
        </div>
        <button type="submit" name="submit" class="btn-primary">Mettre à jour</button>
    </form>
</div>
</body>
</html>
