<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste d'Utilisateurs</title>
    <style>
        /* CSS pour les boutons du tableau d'utilisateurs */
        .table {
            font-size: 16px;
            border-collapse: collapse; /* Fusionner les bordures de la table */
            width: 100%;
        }

        .table th,
        .table td {
            padding: 8px; /* Espacement interne */
            text-align: left; /* Alignement du texte à gauche */
        }

        .table th {
            font-weight: bold; /* Texte en gras pour les en-têtes */
            background-color: #f2f2f2; /* Couleur de fond pour les en-têtes */
        }

        /* Styles pour les boutons "Modifier" */
        .btn-modifier,
        .btn-supprimer {
            display: inline-block; /* Afficher en ligne */
            padding: 6px 12px; /* Espacement interne */
            text-decoration: none; /* Suppression du soulignement */
            border-radius: 4px; /* Coins arrondis */
            transition: background-color 0.3s ease; /* Animation de transition */
            margin-right: 5px; /* Marge à droite pour les boutons */
            color: #fff; /* Couleur du texte */
            font-weight: bold; /* Texte en gras */
        }

        .btn-modifier {
            background-color: #303e50; /* Couleur de fond */
        }

        .btn-supprimer {
            background-color: #303e50; /* Couleur de fond */
        }

        /* Styles au survol des boutons */
        .btn-modifier:hover,
        .btn-supprimer:hover {
            filter: brightness(90%); /* Réduire la luminosité au survol */
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Liste d'Utilisateurs</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateurs as $utilisateur): ?>
            <tr>
                <td><?= $utilisateur->id_utilisateur; ?></td>
                <td><?= $utilisateur->nom; ?></td>
                <td><?= $utilisateur->email; ?></td>
                <td>
                    <a href="<?= URI . 'utilisateurs/modifier/' . $utilisateur->id_utilisateur; ?>" class="btn-modifier">Modifier</a>
                    <a href="<?= URI . 'utilisateurs/supprimer/' . $utilisateur->id_utilisateur; ?>" class="btn-supprimer">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
