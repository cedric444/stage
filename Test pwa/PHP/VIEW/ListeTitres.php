<?php

$liste = TitresManager::getList();



echo '<div class="colonne">
<div class="titre"><h1>Titres</h1></div></br>';
echo '<div class="libelle colonne">';
foreach($liste as $titre)
{
    echo '<div class="nom">'.$titre->getLibelleTitre().'</div>';
}

echo'</div></div>';