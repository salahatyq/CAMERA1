<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond */
            font-family: Arial, sans-serif; /* Police de caractère */
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff; /* Couleur de fond de la boîte */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333; /* Couleur du texte */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333; /* Couleur du texte */
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc; /* Couleur de la bordure */
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        input[type="submit"] {
            width: fit-content; /* Ajuster la largeur au contenu */
            padding: 12px 24px; /* Ajuster le rembourrage */
            border: none;
            border-radius: 5px;
            background-color: #303e50; /* Couleur de fond du bouton */
            color: #fff; /* Couleur du texte */
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Animation de transition */
            display: block; /* Afficher le bouton en tant que bloc pour centrer */
            margin: 0 auto; /* Centrer horizontalement */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Couleur de fond au survol */
        }

        img {
            display: block;
            margin: 0 auto; /* Centrer horizontalement */
            max-width: 30%; /* Ajuster la largeur maximale */
            height: auto;
            margin-top: 10px;
            border-radius: 5px; /* Ajouter une bordure arrondie */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Ajouter une légère ombre */
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Modifier Produit</h2>
    <form method="post" enctype="multipart/form-data" action="<?= URI . 'products/mettreAJour/' . $product->id_lens; ?>">
        <div class="form-group">
            <label for="nom">Titre :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= $product->nom; ?>" required />
        </div>
        <div class="form-group">
            <label for="courte_description">Description courte :</label>
            <input type="text" class="form-control" id="courte_description" name="courte_description" value="<?= $product->courte_description; ?>" required />
        </div>
        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="text" class="form-control" id="prix" name="prix" value="<?= $product->prix; ?>" required />
        </div>
        <div class="form-group">
            <label for="quantite">Quantité :</label>
            <input type="text" class="form-control" id="quantite" name="quantite" value="<?= $product->quantite; ?>" required />
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <input type="text" class="form-control" id="description" name="description" value="<?= $product->description; ?>" required />
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Choisir une image :</label>
            <input type="file" name="image" id="image" />
            <!-- If there is an existing image, show it -->
            <!-- <?php if (isset($product->chemin_image)): ?>
                <img src="<?= !empty($product->chemin_image) ? URI . 'assets/images/' . $product->chemin_image : URI . 'assets/images/sony1.jpg'; ?>" alt="<?= htmlspecialchars($product->nom); ?>">
            <?php endif; ?>
        </div> -->
        <!-- The submit button text should be 'Update Product' -->
        <input type="submit" name="submit" class="btn-primary" value="Mettre à jour">
    </form>
</div>
</body>
</html>
