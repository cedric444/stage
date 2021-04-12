<?php

$mode = $_GET['mode'];
$produit = new Produits($_POST);
var_dump($produit);
switch ($mode) {
    case "ajouter":
        {
            if($produit->getPrixProduit()=='' | $produit->getQuantite()=='')
            {
                $produit->setPrixProduit(null);
                $produit->setQuantite(null);
            }var_dump($produit);
            ProduitsManager::add($produit);
            
            break;
        }
    case "modifier":
        {
            if($produit->getPrixProduit()=='' | $produit->getQuantite()=='')
            {
                $produit->setPrixProduit(null);
                $produit->setQuantite(null);
            }var_dump($produit);
            ProduitsManager::update($produit);
            break;
        }
    // case "supprimer":
    //     {
    //         var_dump($produit->getIdProduit());
            
    //         ProduitsManager::delete($produit->getIdProduit());
            
    //         break;
    //     }

}
// header("location:index.php?page=ListeProduits");
