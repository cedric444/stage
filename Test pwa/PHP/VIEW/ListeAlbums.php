<?php


$liste = AlbumsManager::getList();

echo '<div class="colonne">
<div class="titre"><h1>Albums</h1></div></br>';
echo '<div class="libelle colonne">';
foreach($liste as $nom)
{
    echo '<div class="nom" id="'.$nom->getIdAlbum().'">'.$nom->getNomAlbum().'</a></div>';
}

echo'</div></div>';