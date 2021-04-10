<?php

$mode = $_GET['mode'];
$commande = new Commandes($_POST);
var_dump($commande);
switch ($mode) {
    case "ajouter":
        {
            CommandesManager::add($commande);
            break;
        }
    case "modifier":
        {
            CommandesManager::update($commande);
            break;
        }
    case "supprimer":
        {
            CommandesManager::delete($commande);
            break;
        }

}
// header("location:index.php?page=ListeCommandes");
