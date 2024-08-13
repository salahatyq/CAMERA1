<?php
 
class Panier
{
    public function __construct()
    {
        if (!isset($_SESSION['Paniers'])) {
            $_SESSION['Paniers'] = [];
        }
    }
 
    public function ajouter($id_lens, $quantite)
    {
        if (isset($_SESSION['Paniers'][$id_lens])) {
            $_SESSION['Paniers'][$id_lens] += $quantite;
        } else {
            $_SESSION['Paniers'][$id_lens] = $quantite;
        }
    }
 
    public function supprimer($id_lens)
    {
        unset($_SESSION['Paniers'][$id_lens]);
    }
 
    public function getAll()
    {
        $products = [];
        $productModel = new Product();
        foreach ($_SESSION['Paniers'] as $id_lens => $quantite) {
            $product = $productModel->getOneById($id_lens);
            if ($product) {
                $products[] = [$product, $quantite];
            }
        }
        return $products;
    }
 
    public function getTotalPrice()
    {
        $totalPrice = 0;
        $productModel = new Product();
        foreach ($_SESSION['Paniers'] as $id_lens => $quantite) {
            $product = $productModel->getOneById($id_lens);
            if ($product) {
                $totalPrice += $product->prix * $quantite;
            }
        }
        return $totalPrice;
    }
 
    public function payer()
    {
        // Retrieve payment information from form
        $cardNumber = $_POST['cardNumber'];
        $expiryDate = $_POST['expiryDate'];
        $cvv = $_POST['cvv'];
 
        // Process payment (pseudo-code, replace with actual payment gateway integration)
        if ($this->processPayment($cardNumber, $expiryDate, $cvv)) {
            // On successful payment
            echo "Payment successful!";
            // Here, you can add logic to clear the cart, record the order, etc.
        } else {
            // On payment failure
            echo "Payment failed. Please try again!";
        }
    }
 
    private function processPayment($cardNumber, $expiryDate, $cvv)
    {
        // This function should integrate with a real payment processor
        // For demo purposes, it simply returns true
        return true;
    }
 
}
?>