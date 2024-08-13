<?php
 
class Commande extends Model {
    public function __construct() {
        parent::__construct();
        $this->table = "Commande";
    }
 
    public function getCommandes() {
        $this->sql = "SELECT * FROM " . $this->table;
        return $this->getLines();
    }
 
    public function getOneById($id) {
        $this->sql = "SELECT * FROM " . $this->table . " WHERE id_commande = :id_commande";
        return $this->getLines(['id_commande' => $id], true);
    }
 
    public function ajouter($data) {
        $this->sql = "INSERT INTO " . $this->table . " (quantite, prix, statut, date_creation, id_utilisateur, mode_paiement) VALUES (:quantite, :prix, :statut, NOW(), :id_utilisateur, :mode_paiement)";
        return $this->getLines($data, null);
    }
 
    public function supprimer($id) {
        $this->sql = "DELETE FROM " . $this->table . " WHERE id_commande = :id_commande";
        return $this->getLines(['id_commande' => $id], null);
    }
}
?>
 