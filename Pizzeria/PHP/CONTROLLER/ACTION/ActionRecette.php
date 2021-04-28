<?php
var_dump($_POST);
$mode = $_GET['mode'];
$recette = new Recettes($_POST);

if(isset($_FILES) && !empty($_FILES)){
    $recette->setImagePizza($_FILES['imagePizza']['name']);
}

if($recette->getDateDebut() =='')
{
    $recette->setDateDebut(null);
}

if($recette->getDateFin() =='')
{
    $recette->setDateFin(null);
}

switch ($mode) {
    case "ajouter":
        {
            
            $recette->setImagePizza(chargerImage('imagePizza'));
            var_dump($recette);
            RecettesManager::add($recette);
            break;
        }
    case "modifier":
        {
            /*si l'image a été modifiée*/
            if(isset($_POST["modifImage"]))
            {   /*suppression de l'ancienne image*/
                $ancienneValeur= RecettesManager::findById($recette->getImagePizza());
                if($ancienneValeur)
                {
                    unlink("IMG/".$ancienneValeur->getImagePizza());
                    /*Chargement de la nouvelle image*/
                    $recette->setImagePizza(chargerImage('imagePizza'));
                }
                else
                {
                    $recette->setImagePizza(chargerImage('imagePizza'));
                }
            }
            var_dump($recette);
            RecettesManager::update($recette);
            break;
        }
    case "supprimer":
        {   /*suppression de l'image*/
            unlink("IMG/".$recette->getImagePizza());
            RecettesManager::delete($recette);
            break;
        }

}

header("location:index.php?page=ListeRecettes");
