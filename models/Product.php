<?php

class Product extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "Product";
    }

    public function ajouter($data)
    {
        $this->sql = "insert into " . $this->table . " (nom, prix, description, courte_description, quantite) 
                        VALUE (:nom, :prix, :description, :courte_description, :quantite)";
        return $this->getLines($data, null);
    }
    
    public function getLastInsertId() {
        return $this->db->lastInsertId();
    }
    

    public function getProducts() {
        $this->sql = "SELECT p.*, i.chemin_image FROM " . $this->table . " p LEFT JOIN Image i ON p.id_lens = i.id_lens;";
        $result = $this->getLines();
        error_log(print_r($result, true)); // Cela imprimera le résultat dans le fichier de log PHP
        return $result;
    }
    

    public function supprimer($id_lens) {
        // First, delete related images to prevent foreign key constraint violation
        $this->sql = "DELETE FROM Image WHERE id_lens = :id_lens";
        $this->getLines(['id_lens' => $id_lens], null);
    
        // Now, it's safe to delete the film
        $this->sql = "DELETE FROM " . $this->table . " WHERE id_lens = :id_lens";
        return $this->getLines(['id_lens' => $id_lens], null);
    }
    


    public function getOneById($id_lens) {
        $this->sql = "SELECT p.*, i.chemin_image FROM " . $this->table . " p 
                      LEFT JOIN Image i ON p.id_lens = i.id_lens WHERE p.id_lens = :id_lens";
    
        // Ensure you pass an associative array with keys that match the SQL placeholders
        return $this->getLines(array('id_lens' => $id_lens), true);
    }
    

    public function mettreAJour($id_lens, $data) {
        // Add the id_lens to the $data array
        $data['id_lens'] = $id_lens;
    
        $this->sql = "UPDATE " . $this->table . " SET 
            nom = :nom, 
            prix = :prix, 
            description = :description, 
            courte_description = :courte_description, 
            quantite = :quantite 
            WHERE id_lens = :id_lens";

    
        // The $data array now should have all the necessary keys for binding
        return $this->getLines($data, null);
    }
    
    public function updateImagePath($id_lens, $imagePath) {
        // Check if an image already exists for the product
        $this->sql = 'SELECT * FROM Image WHERE id_lens = :id_lens';
        $existingImage = $this->getLines(['id_lens' => $id_lens], true);
    
        if ($existingImage) {
            // Image exists, update it
            $this->sql = "UPDATE Image SET chemin_image = :chemin_image WHERE id_lens = :id_lens";
            return $this->getLines(['chemin_image' => $imagePath, 'id_lens' => $id_lens], null);
        } else {
            // No image exists, insert a new one
            $this->sql = "INSERT INTO Image (id_lens, chemin_image) VALUES (:id_lens, :chemin_image)";
            return $this->getLines(['chemin_image' => $imagePath, 'id_lens' => $id_lens], null);
        }
    }
}