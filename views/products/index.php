<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
   
    <title>Liste d'articles</title>
   
    <style>
        body {
            font-family: 'PT Serif', serif;
            margin: 0;
            padding: 0;
        }
       
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px; /* Correction du décalage dû à la marge négative des colonnes */
            margin-left: -15px; /* Correction du décalage dû à la marge négative des colonnes */
        }
       
        .product-item {
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ajout de l'ombre */
            flex: 0 0 30%; /* Les produits occuperont 30% de l'espace, soit trois produits par ligne */
            margin: 0 15px 30px 15px; /* Espacement entre les produits */
        }
       
        .product-item img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
       
        .product-details h2 {
            margin-top: 0;
        }
       
        .product-details p {
            margin-bottom: 10px;
        }
       
        .btn-success {
            background-color: #303e50; /* Couleur de fond du bouton */
            color: #fff; /* Couleur du texte */
            border: none; /* Suppression de la bordure */
            border-radius: 6px; /* Ajout des coins arrondis */
            padding: 8px 16px; /* Espacement interne */
            text-decoration: none; /* Suppression du soulignement */
            transition: background-color 0.3s ease; /* Animation de transition */
            display: inline-block; /* Pour centrer horizontalement */
            margin: auto; /* Pour centrer verticalement et horizontalement */
            max-width: fit-content; /* Ajuste la largeur au contenu */
        }
       
        .btn-success:hover {
            background-color: #001f29; /* Couleur de fond du bouton au survol */
        }

        .product-details {
            text-align: center; /* Centrage horizontal du contenu */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="font-size: 24px; text-align: center; margin-bottom: 20px;">Chaque clic, une graine plantée dans le jardin de vos souvenirs.</h1>
     
        <?php if (isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->id_role == 1): ?>
            <div class="btn-group mb-3"> <!-- Change ici -->
                <a class="btn-success" href="<?= URI . 'products/ajouter' ?>">Ajouter</a>
            </div>
        <?php endif; ?>
     
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <img  src="<?= isset($product->chemin_image) ? URI . $product->chemin_image : URI . 'assets/image.jpeg'; ?>" alt="<?= $product->nom; ?>">
                    <div class="product-details">
                        <h2><?= htmlspecialchars($product->nom); ?></h2>
                        <p>Prix: <?= htmlspecialchars($product->prix); ?>$</p>
                        <p>Quantité: <?= htmlspecialchars($product->quantite); ?></p>
                        <p><?= htmlspecialchars($product->courte_description); ?></p>
                        <?php if (!(isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->id_role == 1)): ?>
                            <a class="btn-success" href="<?= URI . 'paniers/ajouter/' . $product->id_lens; ?>">Ajouter au panier</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->id_role == 1): ?>
                            <a class="btn-sm btn-warning" href="<?= URI . 'products/modifier/' . $product->id_lens; ?>"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn-sm btn-danger" href="<?= URI . 'products/supprimer/' . $product->id_lens; ?>"><i class="bi bi-trash"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
