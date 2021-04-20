<?php
$mode = $_GET['mode'];
$recette = new Recettes($_POST);
$recette->setImagePizza($_FILES['imagePizza']['name']);
// var_dump($_FILES);
switch ($mode) {
    case "ajouter":
        {
            $recette->setImagePizza(chargerImage());
            var_dump($recette->setImagePizza(chargerImage()));
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
                    $recette->setImagePizza(chargerImage());
                }
                else
                {
                    $recette->setImagePizza(chargerImage());
                    // var_dump($recette->setImagePizza(chargerImage()));
                }
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
    if(is_uploaded_file($_FILES['imagePizza']['tmp_name']))
    {
        $leNom = uniqid('jpg_') . '.jpg';
        // var_dump($leNom);
        move_uploaded_file($_FILES['imagePizza']['tmp_name'], 'IMG/' .$leNom);
    }
    return $leNom;
    
}
// header("location:index.php?page=ListeRecettes");
