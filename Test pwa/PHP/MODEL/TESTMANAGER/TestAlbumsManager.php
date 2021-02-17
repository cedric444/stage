<?php

//Test AlbumsManager

echo "recherche id = 1" . "<br>";
$obj =AlbumsManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Albums(["nomAlbum" => "([value 1])", "AnneeAlbum" => "([value 2])"]);
var_dump(AlbumsManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = AlbumsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setnomAlbum("[(Value)]");
AlbumsManager::update($obj);
$objUpdated = AlbumsManager::findById(1);
echo "Liste des objets" . "<br>";
$array = AlbumsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = AlbumsManager::findById(1);
AlbumsManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = AlbumsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>