<?php
$mode = $_GET['mode'];
$produit = new Produits($_POST);
if(isset($_FILES) && !empty($_FILES)){
    $produit->setImage($_FILES['image']['name']);
}
if($produit->getPrixProduit()=='')
{
    $produit->setPrixProduit(null);
}
if($produit->getQuantite()=='')
{
    $produit->setQuantite(null);
}
switch ($mode) {
    case "ajouter":
        {    
            $produit->setImage(chargerImage('image'));
            ProduitsManager::add($produit);
            
            break;
        }
    case "modifier":
        {
          /*si l'image a été modifiée*/
            if(isset($_POST["modifImage"]))
            {   /*suppression de l'ancienne image*/
                $ancienneValeur= ProduitsManager::findById($produit->getImage());
                if($ancienneValeur)
                {
                    unlink("IMG/".$ancienneValeur->getImage());
                    /*Chargement de la nouvelle image*/
                    $produit->setImage(chargerImage('image'));
                }
                else
                {
                    $produit->setImage(chargerImage('image'));
                }
            }
            
            ProduitsManager::update($produit);
            break;
        }

}

header("location:index.php?page=ListeProduits");