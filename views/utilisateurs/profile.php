<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
    body {
    /* background-image: url('../assets/images/bc4.jpg'); Path to your sharp background image */
    background-size: cover;
    background-position: center;
    /* Ensure there's no filter property that includes blur */
}
 
 
 
 
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Couleur de fond avec opacité */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
 
        h1 {
            text-align: center;
            color: #333;
        }
 
        p {
            margin-bottom: 20px;
        }
 
        strong {
            font-weight: bold;
        }
 
        .user-info {
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
 
        .user-info p {
            margin-bottom: 10px;
        }
 
        .user-info strong {
            color: #333;
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h1> Profile d'utilisateur</h1>
        <p>
            <strong>Nom:</strong> <?= $user->nom ?><br>
            <strong>Prénom:</strong> <?= $user->prenom ?><br>
            <strong>Email:</strong> <?= $user->email ?><br>
            <strong>Numéro de téléphone:</strong> <?= $user->telephone ?><br>
            <strong>Date de naissance:</strong> <?= $user->date_naissance ?>
        </p>
       
    </div>
</body>
</html>