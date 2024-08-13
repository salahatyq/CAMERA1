<?php

class Paniers extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $panier = new Panier();
        $products = $panier->getAll();
        $this->render('index', compact('products'));

    }

    public function test($data)
    {
        echo $data;
//        echo "Je suis test";

    }

    public function ajouter($id_lens)
    {
        if (is_numeric($id_lens)) {
            $panier = new Panier();
            $panier->ajouter($id_lens, 1);
        }
        header('Location: ' . URI . 'products/index');


    }

    public function modifier($id_lens)
    {
        if (is_numeric($id_lens)) {
            $quantite = $_POST['quantite'];
            if (is_numeric($quantite)) {
                $panier = new Panier();
                $panier->ajouter($id_lens, $quantite);
            }
        }
        header("Location: " . URI . "products/index");

    }

    public function supprimer($id_lens)
    {
        if (is_numeric($id_lens)) {
            $panier = new Panier();
            $panier->supprimer($id_lens);
        }
        header("Location: " . URI . "products/index");
    }

}