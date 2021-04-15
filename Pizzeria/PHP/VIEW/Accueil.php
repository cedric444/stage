<section>
    <div class="info colonne">
<?php

if(isset($_SESSION['user']))
{
    $role = $_SESSION['user']->getIdRole();
    if($role==2){
    echo'<div class="titre centre"><h1>Bienvenue</h1></div>';
    }
}
else
{
    echo'<div class="titre centre"><h1>Bienvenue</h1></div>';
}

?>
<div class="espaceHor"></div>
<div class="triple"></div><div class="double"><a href="index.php?page=FormUser&mode=ajouter"><button class="bouton"> Inscription</button></a></div><div class="triple"></div>
<div class="espaceHor"></div>
<div class="triple"></div><div class="double"><a href="index.php?page=FormConnexion"><button class="bouton">Connexion</button></a></div><div class="triple"></div>
</div>