<?php

$mode = $_GET['mode'];
$typeProduit = new Typesproduits($_POST);
var_dump($typeProduit);
switch ($mode) {
    case "ajouter":
        {
            TypesproduitsManager::add($typeProduit);
            break;
        }
    case "modifier":
        {
            TypesproduitsManager::update($typeProduit);
            break;
        }
    case "supprimer":
        {
            TypesproduitsManager::delete($typeProduit);
            break;
        }

}
header("location:index.php?page=ListeTypesProduits");
