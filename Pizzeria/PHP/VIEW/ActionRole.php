<?php

$mode = $_GET['mode'];
$role = new Roles($_POST);
switch ($mode) {
    case "ajouter":
        {
            RolesManager::add($role);
            break;
        }
    case "modifier":
        {
            RolesManager::update($role);
            break;
        }
    case "supprimer":
        {
            RolesManager::delete($role);
            break;
        }

}
header("location:index.php?page=ListeRoles");