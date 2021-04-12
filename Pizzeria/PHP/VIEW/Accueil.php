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
<div class="triple"></div><button class="bouton">Inscription</button><div class="triple"></div>
<div class="espaceHor"></div>
<div class="triple"></div><button class="bouton">Connexion</button><div class="triple"></div>
