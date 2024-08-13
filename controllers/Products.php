<?php

class Products extends Controllers {
    private $productModel;

    public function __construct() {
        parent::__construct(); // Make sure that parent's constructor is called if it's necessary.
        $this->productModel = new Product(); // Instantiate the Product model.
    }
    
    public function index() {
        $products = $this->productModel->getProducts(); // Use already instantiated model
        $this->render("index", compact('products'));
    }

    /**
     * @return void
     */
    public function ajouter() {
        if (isset($_SESSION['Utilisateur']) && strtolower($_SESSION['Utilisateur']->description) === Auth::ADMIN) {
            global $oPDO; // Accéder à la connexion PDO globale
           
            if (isset($_POST['submit'])) {
                unset($_POST['submit']);
                if (!$this->estVide($_POST)) {
                    $this->productModel->ajouter($_POST);
                    $id_lens = $oPDO->lastInsertId(); // Utiliser la connexion PDO globale
                    $this->telechargerImage($id_lens);
                }
                header("Location: " . URI . "products/index");
                exit;
            }
            $this->render('ajouter');
        } else {
            header("Location: " . URI . "products/index");
            exit;
        }
    }
    /**
     * @param $id_lens
     * @return void
     */
    private function telechargerImage($id_lens) {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $image_name = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            $image_destination = "assets/images/" . basename($image_name); // Destination path on the server
    

            $image_type = strtolower(pathinfo($image_destination, PATHINFO_EXTENSION));

            if (!in_array($image_type, array("jpg", "jpeg", "png", "gif"))) {
                echo "Seules les images JPG, JPEG, PNG et GIF sont autorisées.";
                exit();
            }
            if (move_uploaded_file($image_tmp, ROOT . $image_destination)) {
                $this->productModel->updateImagePath($id_lens, $image_destination);
            }
        }
    }

    public function supprimer($id_lens)
{
    if (is_numeric($id_lens)) {
        // First, delete the item from the database
        $this->productModel->supprimer($id_lens);

        // Remove the item from users' carts
        $panierModel = new Panier();
        $panierModel->supprimer($id_lens);

        // Redirect or return a success message
        header('Location: ' . URI . 'products/index?success=deleted');
        exit;
    } else {
        // Redirect with an error message for invalid ID
        header('Location: ' . URI . 'products/index?error=invalidid');
        exit;
    }
}

    
    
    

    // Modifier method
    public function modifier($id_lens) {
        // Logic to fetch the product and display the edit form
        $product = $this->productModel->getOneById($id_lens); // Ensure this method exists in the Film model
        $this->render('modifier', ['product' => $product]);
    }

    public function mettreAJour($id_lens) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Filter out the submit button from the POST data
            $updatedProductData = $_POST;
            unset($updatedProductData['submit']);
    
            // Handle image upload if a new file is provided
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
                $this->telechargerImage($id_lens);
            }
    
            // Now, update the product details in the database
            $this->productModel->mettreAJour($id_lens, $updatedProductData);
    
            header('Location: ' . URI . 'products/index');
            exit;
        } else {
            header('Location: ' . URI . 'products/modifier/' . $id_lens);
            exit;
        }
    }
    
    


    
}


?>