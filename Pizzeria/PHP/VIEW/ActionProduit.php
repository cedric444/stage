<?php
// var_dump($_FILES);
$mode = $_GET['mode'];

$produit = new Produits($_POST);
$produit->setImage($_FILES['image']['name']);
var_dump($produit);
var_dump($_POST);
switch ($mode) {
    case "ajouter":
        {
            if($produit->getPrixProduit()=='' | $produit->getQuantite()=='')
            {
                $produit->setPrixProduit(null);
                $produit->setQuantite(null);
            }
            // var_dump($produit);
            $produit->setImage(chargerImage());
            ProduitsManager::add($produit);
            
            break;
        }
    case "modifier":
        {
            if($produit->getPrixProduit()=='' | $produit->getQuantite()=='')
            {
                $produit->setPrixProduit(null);
                $produit->setQuantite(null);
            }
            // var_dump($produit);
            /*si l'image a été modifiée*/
            if(isset($_POST["modifImage"]))
            {   /*suppression de l'ancienne image*/
                $ancienneValeur= ProduitsManager::findById($produit->getImage());
                if($ancienneValeur)
                {
                    unlink("IMG/".$ancienneValeur->getImage());
                    /*Chargement de la nouvelle image*/
                    $produit->setImage(chargerImage());
                }
                else
                {
                    $produit->setImage(chargerImage());
                    // var_dump($produit->setImage(chargerImage()));
                }
            }
            
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

function chargerImage(){
    if(is_uploaded_file($_FILES['image']['tmp_name']))
    {
        $leNom = uniqid('jpg_') . '.jpg';
        // var_dump($leNom);
        return $leNom;
    
        move_uploaded_file($_FILES['image']['tmp_name'], 'IMG/' .$leNom);
    }
        
   
}