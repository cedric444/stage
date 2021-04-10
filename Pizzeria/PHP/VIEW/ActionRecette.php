<?php

$mode = $_GET['mode'];
$recette = new Recettes($_POST);
var_dump($recette);
switch ($mode) {
    case "ajouter":
        {
            RecettesManager::add($recette);
            break;
        }
    case "modifier":
        {
            RecettesManager::update($recette);
            break;
        }
    case "supprimer":
        {
            RecettesManager::delete($recette);
            break;
        }

}
// header("location:index.php?page=ListeRecettes");
