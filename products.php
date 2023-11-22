<?php
class Product {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function searchProducts($keyword) {
        // Code de recherche de produits
    }

    public function viewProductDetails($productId) {
        // Code d'affichage des détails d'un produit
    }

    // Autres méthodes pour la gestion du panier et des commandes
}
?>