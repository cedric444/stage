<?php

$mode = $_GET['mode'];
$user = new Users($_POST);
var_dump($user);
switch ($mode) {
    case "ajouter":
        {
            UsersManager::add($user);
            break;
        }
    case "modifier":
        {
            UsersManager::update($user);
            break;
        }
    case "supprimer":
        {
            UsersManager::delete($user);
            break;
        }

}
// header("location:index.php?page=ListeUsers");