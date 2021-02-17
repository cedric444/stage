<?php

//Test TitresManager

echo "recherche id = 1" . "<br>";
$obj =TitresManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Titres(["libelleTitre" => "([value 1])", "idAlbum" => "([value 2])"]);
var_dump(TitresManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = TitresManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelleTitre("[(Value)]");
TitresManager::update($obj);
$objUpdated = TitresManager::findById(1);
echo "Liste des objets" . "<br>";
$array = TitresManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = TitresManager::findById(1);
TitresManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = TitresManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>