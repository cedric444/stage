<?php

$mode = $_GET['mode'];
$taillePizza = new TaillesPizza($_POST);
var_dump($taillePizza);
switch ($mode) {
    case "ajouter":
        {
            TaillesPizzasManager::add($taillePizza);
            break;
        }
    case "modifier":
        {
            TaillesPizzasManager::update($taillePizza);
            break;
        }
    case "supprimer":
        {
            TaillesPizzasManager::delete($taillePizza);
            break;
        }

}
// header("location:index.php?page=ListeTaillesPizza");
