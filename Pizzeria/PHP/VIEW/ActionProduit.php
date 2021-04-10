<?php

$mode = $_GET['mode'];
$produit = new Produits($_POST);
var_dump($produit);
switch ($mode) {
    case "ajouter":
        {
            ProduitsManager::add($produit);
            break;
        }
    case "modifier":
        {
            ProduitsManager::update($produit);
            break;
        }
    case "supprimer":
        {
            ProduitsManager::delete($produit);
            break;
        }

}
// header("location:index.php?page=ListeProduits");
