<?php
 
class Commandes extends Controllers {
    private $commandeModel;
 
    public function __construct() {
        parent::__construct();
        $this->commandeModel = new Commande();
    }
 
    public function index() {
        $commandes = $this->commandeModel->getCommandes();
        $this->render("index", compact('commandes'));
    }
 
    public function ajouter() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            unset($_POST['submit']);
            $this->commandeModel->ajouter($_POST);
            header('Location: ' . URI . 'commandes/index');
            exit;
        }
        // Render a form view if needed
    }
 
    public function ajouterCommande() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true); // Ou $_POST si vous ne voulez pas utiliser JSON
            // Assurez-vous de valider et de nettoyer $data avant de l'utiliser
            $this->commandeModel->ajouter([
                'quantite' => $data['quantite'], // Ajustez ces clés selon la structure de votre commande
                'prix' => $data['prix'],
                'statut' => 'Payé', // Vous pouvez définir d'autres statuts selon votre logique
                'id_utilisateur' => $_SESSION['Utilisateur']->id_utilisateur,
                'mode_paiement' => 'PayPal'
            ]);
            echo json_encode(['success' => true]);
            exit;
        }
    }
 
 
    public function modifier($id) {
        $commande = $this->commandeModel->getOneById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            unset($_POST['submit']);
            $this->commandeModel->mettreAJour($id, $_POST);
            header('Location: ' . URI . 'commandes/index');
            exit;
        }
        $this->render('modifier', ['commande' => $commande]);
    }
 
    public function supprimer($id) {
        $this->commandeModel->supprimer($id);
        header('Location: ' . URI . 'commandes/index');
        exit;
    }
}
?>