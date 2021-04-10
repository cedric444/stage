<?php

$mode = $_GET['mode'];
$taillePizza = new Taillespizzas($_POST);
var_dump($taillesPizza);
switch ($mode) {
    case "ajouter":
        {
            TaillespizzasManager::add($taillePizza);
            break;
        }
    case "modifier":
        {
            TaillespizzasManager::update($taillePizza);
            break;
        }
    case "supprimer":
        {
            TaillespizzasManager::delete($taillePizza);
            break;
        }

}
// header("location:index.php?page=ListeTaillespizzas");
