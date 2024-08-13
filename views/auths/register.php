<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Inscription</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: "PT Serif", serif;
            background-color: #f8f9fa;
        }
 
        .page-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding-top: 92px; /* Ajout d'espace en haut */
        }
 
        .form-container {
            width: 50%; /* Largeur du formulaire */
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
 
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }
 
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="submit"] {
            width: calc(100% - 20px); /* Largeur des champs de formulaire */
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
 
        input[type="submit"] {
            width: 20%; 
            background-color: #303e50;
            color: white;
            cursor: pointer;
            border: none;
            margin: 0 auto;
            display: block;
        }
 
        input[type="submit"]:hover {
            background-color: #1c2b36;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="form-container">
            <h2 style="text-align: center;">Inscription</h2>
            <form method="post">
                <div class="mb-4">
                    <label for="nom" class="form-label">Nom:</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="mb-4">
                    <label for="prenom" class="form-label">Prénom:</label>
                    <input type="text" class="form-control" id="prenom" name="prenom">
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-4">
                    <label for="date_naissance" class="form-label">Date de naissance:</label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                </div>
                <div class="mb-4">
                    <label for="telephone" class="form-label">Téléphone:</label>
                    <input type="text" class="form-control" id="telephone" name="telephone">
                </div>
                <div class="mb-4">
                    <label for="mot_de_passe" class="form-label">Mot de passe:</label>
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe">
                </div>
                <div class="mb-4">
                    <label for="c_mot_de_passe" class="form-label">Confirmer mot de passe:</label>
                    <input type="password" class="form-control" id="c_mot_de_passe" name="c_mot_de_passe">
                </div>
                <input type="submit" name="submit" value="Enregistrer" class="submit-btn">
            </form>
        </div>
    </div>
</body>
</html>
