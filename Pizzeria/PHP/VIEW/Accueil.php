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
<div class="triple"></div><button class="bouton"><a href="index.php?page=FormUser"> Inscription</a></button><div class="triple"></div>
<div class="espaceHor"></div>
<div class="triple"></div><button class="bouton"><a href="index.php?page=FormConnexion">Connexion</a></button><div class="triple"></div>
