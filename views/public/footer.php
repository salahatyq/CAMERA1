<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        /* Custom Footer Styling */
        .footer {
            background-color: #2c3e50; /* Dark slate color */
            color: #ecf0f1; /* Light color for contrast */
            text-align: center;
            padding: 5px 0; /* Réduction de la hauteur du footer */
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 8%;
            font-size: 13px; /* Taille de la police */
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
            transition: transform 0.3s ease; /* Ajout de l'effet de transition */
        }
       


        .footer.hidden {
            transform: translateY(100%); /* Fait glisser le footer vers le bas pour le cacher */
        }

        .footer a {
            color: #ecf0f1; /* Light color for readability */
            text-decoration: none;
            margin: 0 10px;
        }

        .footer a:hover {
            text-decoration: underline;
            color: #3498db; /* Color change for hover/focus */
        }


        /* Ajout d'un espacement en bas du corps du document */
        body {
            margin-bottom: 70px; /* Correspond à la hauteur du footer */
            font-family: 'PT Serif', serif;
        }
    </style>
</head>
<body>
 
<footer class="footer" id="footer">
    <p>© <?= date("Y"); ?> EyeLenses. Tous droits réservés.</p>
    <p>
        <a href="#">Mentions légales</a> |
        <a href="#">Politique de confidentialité</a> |
        <a href="#">Conditions générales de vente</a>
    </p>
</footer>

<script>
    window.addEventListener("scroll", function() {
        let scrollHeight = document.documentElement.scrollHeight;
        let windowHeight = window.innerHeight;
        let footer = document.getElementById('footer');
        if (window.scrollY + windowHeight >= scrollHeight) {
            footer.classList.remove('hidden');
        } else {
            footer.classList.add('hidden');
        }
    });
</script>
 
</body>
</html>
