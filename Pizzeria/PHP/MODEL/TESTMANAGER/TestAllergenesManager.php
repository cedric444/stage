<?php

//Test AllergenesManager

echo "recherche id = 1" . "<br>";
$obj =AllergenesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Allergenes(["libelleAllergene" => "([value 1])"]);
var_dump(AllergenesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = AllergenesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelleAllergene("[(Value)]");
AllergenesManager::update($obj);
$objUpdated = AllergenesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = AllergenesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = AllergenesManager::findById(1);
AllergenesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = AllergenesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>