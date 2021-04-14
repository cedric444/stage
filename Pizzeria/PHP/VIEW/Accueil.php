<?php

if(isset($_SESSION['user']))
{
    $role = $_SESSION['user']->getIdRole();
    if($role==2){
    echo'<div class="titre">Bienvenue</div>';
    }
}
else
{
    echo'<div class="triple"></div><div class="titre">Bienvenue</div><div class="triple"></div><div class="espaceHor"></div>';
}

?>
<div class="espaceHor"></div>
<div class="triple"></div><a href="index.php?page=FormUser&mode=ajouter"><button class="bouton"> Inscription</button></a><div class="triple"></div>
<div class="espaceHor"></div>
<div class="triple"></div><a href="index.php?page=FormConnexion"><button class="bouton">Connexion</button></a><div class="triple"></div>
