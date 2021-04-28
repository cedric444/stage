<?php
$mode = $_GET['mode'];
$allergene = new Allergenes($_POST);
switch ($mode) {
    case "ajouter":
        {
            AllergenesManager::add($allergene);
            break;
        }
    case "modifier":
        {
            AllergenesManager::update($allergene);
            break;
        }
    case "supprimer":
        {
            AllergenesManager::delete($allergene);
            break;
        }

}
header("location:index.php?page=ListeAllergenes");