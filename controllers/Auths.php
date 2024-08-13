<?php

class Auths extends Controllers
{
    public function inscription()
    {
        // Vérifier si l'utilisateur est déjà connecté, rediriger s'il est déjà connecté
        if (isset($_SESSION['Utilisateur'])) {
            header("Location: " . URI . "products/index");
            exit(); // Assure que le script s'arrête après la redirection
        }

        // Vérifier si le formulaire d'inscription est soumis
        if (isset($_POST["submit"])) {
            // Vérifier si tous les champs du formulaire sont remplis
            if (!($this->estVide($_POST))) {
                // Vérifier si les mots de passe correspondent
                if ($_POST["mot_de_passe"] === $_POST["c_mot_de_passe"]) {
                    // Hacher le mot de passe
                    $_POST["mot_de_passe"] = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
                    
                    // Supprimer les champs inutiles du tableau $_POST
                    unset($_POST["c_mot_de_passe"]);
                    unset($_POST["submit"]);

                    // Définir le rôle de l'utilisateur (par exemple, 1 pour administrateur)
                    $_POST["id_role"] = 2;

                    // Instancier un objet Auth et appeler la méthode inscription pour ajouter l'utilisateur à la base de données
                    $oAuth = new Auth();
                    $oAuth->inscription($_POST);

                    // Redirection vers la page de connexion
                    header("Location: " . URI . "auths/connexion");
                    exit();
                }
            }
        }

        // Si le formulaire n'est pas soumis ou s'il y a des erreurs, afficher le formulaire d'inscription
        $this->render("register");
    }
    
    public function connexion()
    {
        // Vérifier si l'utilisateur est déjà connecté, rediriger s'il est déjà connecté
        if (isset($_SESSION['Utilisateur'])) {
            header("Location: " . URI . "products/index");
            exit();
        }

        // Vérifier si le formulaire de connexion est soumis
        if (isset($_POST['submit'])) {
            // Vérifier si tous les champs du formulaire sont remplis
            if (!$this->estVide($_POST)) {
                // Récupérer l'email et le mot de passe soumis dans le formulaire
                $email = $_POST["email"];
                $mot_de_passe = $_POST["password"];

                // Instancier un objet Auth et appeler la méthode findUserByEmail pour trouver l'utilisateur dans la base de données
                $auth = new Auth();
                $user = $auth->findUserByEmail(['email' => $_POST['email']]);

                // Vérifier si l'utilisateur existe dans la base de données
                if ($user) {
                    // Vérifier si le mot de passe soumis correspond au mot de passe haché stocké dans la base de données
                    if (password_verify($mot_de_passe, $user->mot_de_passe)) {
                        // Authentification réussie, définir l'utilisateur dans la session
                        $_SESSION["Utilisateur"] = $user;

                        // Redirection vers la page d'accueil après connexion réussie
                        header("Location: " . URI . "products/index");
                        exit();
                    } else {
                        // Mot de passe incorrect
                        $this->erreurs["emPass"] = "Email ou mot de passe incorrect";
                        $this->render('login', $this->erreurs);
                    }
                } else {
                    // Utilisateur non trouvé dans la base de données
                    $this->erreurs["emPass"] = "Email ou mot de passe incorrect";
                    $this->render('login', $this->erreurs);
                }
            } else {
                // Certains champs du formulaire sont vides
                $this->erreurs["emPass"] = "Email ou mot de passe incorrect";
                $this->render('login', $this->erreurs);
            }
        }

        // Si le formulaire n'est pas soumis ou s'il y a des erreurs, afficher le formulaire de connexion
        $this->render('login');
    }
    public function deconnexion()
    {
        // fermeture de la session
        unset($_SESSION['Utilisateur']);
 
        // retour vers la page films/index
        header("Location: " . URI . "products/index");
    } 
 
}


?>
