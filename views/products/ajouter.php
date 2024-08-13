<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Camera</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Couleur de fond */
            margin: 0;
            padding: 0;
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
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            width: calc(100% - 24px);
            padding: 10px;
            border: 1px solid #ccc; /* Couleur de la bordure */
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        input[type="submit"] {
            width: 120px; /* Largeur du bouton */
            margin: 0 auto; /* Centrer le bouton horizontalement */
            display: block; /* Affichage en bloc */
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: #303e50; /* Couleur de fond du bouton */
            color: #fff; /* Couleur du texte */
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Animation de transition */
        }

        input[type="submit"]:hover {
            background-color: #001f29; /* Couleur de fond du bouton au survol */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Add Camera</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Title :</label>
                <input type="text" class="form-control" id="nom" name="nom" required />
            </div>
            <div class="form-group">
                <label for="productName">Camera Short Description :</label>
                <input type="text" class="form-control" id="courte_description" name="courte_description" required />
            </div>
            <div class="form-group">
                <label for="productPrice">Camera Price : </label>
                <input type="text" class="form-control" id="moviePrice" name="prix" required />
            </div>
            <div class="form-group">
                <label for="productPrice">Camera Quantity : </label>
                <input type="text" class="form-control" id="movieQuantity" name="quantite" required />
            </div>
            <div class="form-group">
                <label for="productName">Camera Description :</label>
                <input type="text" class="form-control" id="movieName" name="description" required />
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Choose an Image :</label>
                <input type="file" name="image" id="image" />
            </div>
            <input type="submit" name="submit" class="btn-primary" value="Add Product">
        </form>
    </div>
</body>
</html>
