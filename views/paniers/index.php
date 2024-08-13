<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achats</title>
    <style>
         #paypal-button-container {
        text-align: center;
        width: 50%; /* Vous pouvez ajuster la largeur selon vos besoins */
        margin: 20px auto; /* Centrage vertical et horizontal avec une marge supérieure */
    }
    .actions {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px; /* Espacement entre les boutons */
    }
    /* Adjusting the size of PayPal and Debit/Credit Card buttons is a bit tricky since it's rendered by PayPal's script.
       You might need to check the documentation of PayPal or override the styles after the elements have been rendered. */
 
    /* Style pour les boutons d'actions */
    .btn {
        padding: 4px 8px; /* Taille du padding réduite */
        font-size: 0.75rem; /* Taille de la police réduite */
        border-radius: 5px; /* Rayon de la bordure pour des coins arrondis */
        line-height: 1; /* Hauteur de ligne pour ajuster la taille interne du bouton */
        margin: 0 2px; /* Ajout d'une marge entre les boutons si alignés côte à côte */
    }
 
    /* Centrer les boutons d'action */
    .row {
        justify-content: center; /* Centrage horizontal des boutons dans leur cellule */
    }
 
    /* Réduction de la taille des images */
    td img {
        max-width: 80px; /* Réduction de la largeur maximale */
        max-height: 80px; /* Réduction de la hauteur maximale */
    }
 
    /* Styles pour les petits boutons */
    .btn-sm {
        padding: .25rem .5rem; /* Réduction du remplissage pour les petits boutons */
        font-size: .875rem; /* Réduction de la taille de la police pour les petits boutons */
    }
 
        .container {
            margin-top: 50px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
 
        h1 {
            font-family: 'PT Serif', serif;
            text-align: center;
            margin-bottom: 30px;
        }
 
        table {
            width: 100%;
            border-collapse: collapse;
        }
 
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
 
        th {
            background-color: #007bff;
            color: #fff;
        }
 
        td img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: 0 auto;
        }
 
        .row {
            display: flex;
            justify-content: space-between;
            flex-direction: column; /* Empiler les boutons verticalement */
        align-items: center; /* Centrer les boutons dans la cellule */
        }
 
        input[name="quantite"] {
            width: 50px;
            text-align: center;
        }
 
        .btn {
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            margin: 2px 0;
        }
        .btn, form {
            margin: 0;
        }
        .btn-sm {
        padding: .25rem .5rem; /* Réduire le padding pour les petits boutons */
        font-size: .875rem; /* Réduire la taille de la police pour les petits boutons */
    }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }
 
        .btn-danger {
            padding: 5px 10px;
            background-color: #303e50;
            border-color: #303e50;
            color: #fff;
            padding: 5px 10px; /* Nouveau padding réduit */
            font-size: 0.75rem; /* Nouvelle taille de police réduite */
            margin-top:
        }
 
        #paypal-button-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Achats</h1>
 
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Courte Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $key => $valueProduct): ?>
                    <?php
                    $product = $valueProduct[0];
                    $quantite = $valueProduct[1];
                    ?>
                    <tr>
                        <th scope="row"><?= $key + 1; ?></th>
                        <td>
                        <img  src="<?= isset($product->chemin_image) ? URI . $product->chemin_image : URI . 'assets/image.jpeg'; ?>" alt="<?= $product->nom; ?>">
                        </td>
                        <td><?= isset($product->nom) ? $product->nom : 'N/A'; ?></td>
                        <td><?= isset($product->prix) ? $product->prix : 'N/A'; ?></td>
                        <td>
                            <input name="quantite" min="0" max="<?= isset($product->quantite) ? $product->quantite : '0'; ?>" value="<?= isset($quantite) ? $quantite : '0'; ?>" type="number">
                        </td>
                        <td><?= isset($product->courte_description) ? $product->courte_description : 'N/A'; ?></td>
                        <td class="row">
                        <td class="actions">
                            <form action="<?= URI . 'paniers/modifier/' . $product->id_lens; ?>" method="post">
                                <button type="submit" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>
                            <a class="btn btn-danger" href="<?= URI . 'paniers/supprimer/' . $product->id_lens; ?>">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div id="paypal-button-container"></div> <!-- Container for the PayPal button -->
    </div>
 
    <script src="https://www.paypal.com/sdk/js?client-id=AcWpdxxztnbYmSiSlKWwxDjjq3Mxr3OE0hkgPGtOjYr-5QrHPKS8JQ6syyTe6vDr2y-Rst4lFs-hJqRU&components=buttons"></script>
    <script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '0.01' // Test with a simple transaction value
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
                // Redirect or handle success
            });
        }
    }).render('#paypal-button-container');
    </script>
</body>
</html>