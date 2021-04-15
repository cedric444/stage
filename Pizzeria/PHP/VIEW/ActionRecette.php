<?php

$mode = $_GET['mode'];
$recette = new Recettes($_POST);
var_dump($recette);
switch ($mode) {
    case "ajouter":
        {
            $obj->setImagePizza(chargerImage());
            RecettesManager::add($recette);
            break;
        }
    case "modifier":
        {
            /*si l'image a été modifiée*/
            if(isset($_POST["modifImage"]))
            {   /*suppression de l'ancienne image*/
                $ancienneValeur= RecettesManager::findById($recette->getImagePizza());
                unlink("IMG/".$ancienneValeur->getImagePizza());
                /*Chargement de la nouvelle image*/
                $recette->setImagePizza(chargerImage());
            }
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

function chargerImage()
{
    if(is_uploaded_file($_FILES["imagePizza"]["tmp_name"]))
    {
        $lenom = uniqid('jpg_') . '.jpg';
        move_uploaded_file($_FILES["ImagePizza"]["tmp_name"], 'IMG/'.$lenom);
    }
    return $lenom;
}
// header("location:index.php?page=ListeRecettes");
