<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Login Form</title>
    <style>
        .page-container {
            font-family: "PT Serif", serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container1 {
            width: 70%; /* Largeur de 70% de la page */
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container1 h2 {
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
            text-align: left; 
            display: block;
        }

        .form-control {
            width: 100%; /* Largeur de 100% du conteneur */
            padding: 15px;
            margin-bottom: 30px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 16px;
        }

        .form-control:focus {
            outline: none;
            border-color: #4d90fe;
            box-shadow: 0 0 0 0.15rem rgba(0, 123, 255, 0.25);
        }

        .submit-btn {
            width: 100px; /* Largeur fixe du bouton */
            margin: 0 auto; /* Centrage horizontal du bouton */
            padding: 15px;
            border: none;
            border-radius: 6px;
            background-color: #303e50;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-bottom: 30px;
            border-radius: 6px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 15px;
        }

        .alert-danger strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="container1">
            <h2>Connexion</h2>
            <form method="post">
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                </div>
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <?php if(isset($emPass)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $emPass; ?>
                    </div>
                <?php endif; ?>
                <input type="submit" name="submit" value="Login" class="submit-btn">
            </form>
        </div>
    </div>
</body>
</html>
