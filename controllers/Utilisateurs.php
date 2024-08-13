<?php
 
class Utilisateurs extends Controllers {
    private $utilisateurModel;
 
    public function __construct() {
        parent::__construct();
        $this->utilisateurModel = new Utilisateur();
    }
 
    public function index() {
        $utilisateurs = $this->utilisateurModel->getUtilisateurs();
        $this->render("index", compact('utilisateurs'));
    }
 
    public function modifier($id) {
        $utilisateur = $this->utilisateurModel->getOneById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            unset($_POST['submit']);
            $this->utilisateurModel->mettreAJour($id, $_POST);
            header('Location: ' . URI . 'utilisateurs/index');
            exit;
        }
        $this->render('modifier', ['utilisateur' => $utilisateur]);
    }
 
    public function mettreAJour($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            unset($_POST['submit']);
            $updatedUserData = $_POST;
            $this->utilisateurModel->mettreAJour($id, $updatedUserData);
           
            // Recharger les données utilisateur et mettre à jour la session
            $user = $this->utilisateurModel->getUserById($id);
            $_SESSION['Utilisateur'] = $user;
           
            header('Location: ' . URI . 'utilisateurs/index');
            exit;
        } else {
            header('Location: ' . URI . 'utilisateurs/modifier/' . $id);
            exit;
        }
    }
 
    public function supprimer($id) {
        $this->utilisateurModel->supprimer($id);
        header('Location: ' . URI . 'utilisateurs/index');
        exit;
    }
 
    
    
    
    public function profile() {
        $userModel = new Utilisateur();
        $user = $userModel->getUserById($_SESSION['Utilisateur']->id_utilisateur);
 
        // Vérifiez que les informations utilisateur sont toujours à jour
        $_SESSION['Utilisateur'] = $user;
 
        // Render the profile view with the user data
        $this->render('profile', ['user' => $user]);
    }
   
}
 
?>