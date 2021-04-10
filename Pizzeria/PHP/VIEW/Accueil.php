<?php
$role = $_SESSION['user']->getIdRole();
if($role==2){
    echo'<div class="titre">Bienvenue</div>';
}
?>