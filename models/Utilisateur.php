<?php
 
class Utilisateur extends Model {
    public function __construct() {
        parent::__construct();
        $this->table = "Utilisateur";
    }
 
    public function ajouter($data) {
        $this->sql = "INSERT INTO " . $this->table . " (nom, email, role) VALUES (:nom, :email, :role)";
        return $this->getLines($data, null);
    }
 
    public function getUtilisateurs() {
        $this->sql = "SELECT * FROM " . $this->table;
        return $this->getLines();
    }
 
    public function getOneById($id) {
        $this->sql = "SELECT * FROM " . $this->table . " WHERE id_utilisateur = :id_utilisateur";
        return $this->getLines(['id_utilisateur' => $id], true);
    }
 
    public function mettreAJour($id, $data) {
        // Assurez-vous qu'il n'y a pas d'espace après les deux-points dans vos placeholders.
        $this->sql = "UPDATE " . $this->table . " SET nom = :nom, email = :email WHERE id_utilisateur = :id_utilisateur";
        $params = [
            'nom' => $data['nom'],
            'email' => $data['email'],
            'id_utilisateur' => $id
        ];
        return $this->getLines($params, null);
    }
   
 
    public function supprimer($id) {
        $this->sql = "DELETE FROM " . $this->table . " WHERE id_utilisateur = :id_utilisateur";
        return $this->getLines(['id_utilisateur' => $id], null);
    }
 
    public function getUserById($id) {
        $this->sql = "SELECT * FROM " . $this->table . " WHERE id_utilisateur = :id_utilisateur";
        return $this->getLines(['id_utilisateur' => $id], true);
    }
 
}
?>