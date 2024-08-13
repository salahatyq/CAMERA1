<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <style>
        /* Custom Navbar Styling */
        .navbar {
            background-color: #2c3e50; /* Dark slate color */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
        }

        .navbar-brand {
            font-size: 1.5em; /* Larger size for visibility */
            color: #ecf0f1; /* Light color for contrast */
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #ecf0f1; /* Light color for readability */
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link i {
            margin-right: 5px; /* Spacing between icon and text */
        }

        /* Cart icon black and emphasized */
        .btn {
            background-color: transparent;
            border: none;
            position: relative;
            color: #ffffff;
        }

        .btn .bi-cart3 {
            font-size: 1.5em;
           

        }
        .btn:hover,
        .btn:focus {
            color: #3498db;
        }

        /* Hover effects */
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            color: #3498db; /* Color change for hover/focus */
            background-color: transparent; /* Keep background unchanged */
        }

        /* Dropdown Styling */
        .dropdown-menu {
            background-color: #34495e; /* A slightly lighter shade */
        }

        .dropdown-item {
            color: #ecf0f1;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background-color: #3498db; /* Color change for hover/focus on dropdown */
            color: #fff;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .navbar-nav .nav-link i {
                margin-right: 0; /* Adjust icon spacing on smaller screens */
            }
        }
    </style>
    <title>Camera Store</title>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href=<?= URI . "index" ?>><i class="bi bi-camera"></i> Camera Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href=<?= URI . "index" ?>><i class="bi bi-house-door"></i>Home</a>
                </li>
               
                <?php if (!isset($_SESSION['Utilisateur'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . 'auths/connexion'; ?>"><i class="bi bi-person-circle"></i>Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . 'auths/inscription'; ?>"><i class="bi bi-person-plus"></i>Inscription</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . 'utilisateurs/profile'; ?>"><i class="bi bi-person"></i>Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . 'auths/deconnexion'; ?>"><i class="bi bi-person-x"></i>Déconnexion</a>
                    </li>
                   
                <?php endif; ?>
                
            </ul>
            <!-- Cart Display Logic -->
            <?php if (!(isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->id_role == 1)): ?>
                    <a class="btn " href=<?= URI . "paniers/index" ?>><i class="bi bi-camera2"></i>

<?=
                    (isset($_SESSION['Paniers'])) ?
                        count($_SESSION['Paniers'])
                        : 0;
                    ?></i></a>
                    
                
                    
                    <?php endif; ?>
            
        </div>
    </div>
</nav>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
