<?php

//Test TypesproduitsManager

echo "recherche id = 1" . "<br>";
$obj =TypesproduitsManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Typesproduits(["libelleTypeProduit" => "([value 1])"]);
var_dump(TypesproduitsManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = TypesproduitsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelleTypeProduit("[(Value)]");
TypesproduitsManager::update($obj);
$objUpdated = TypesproduitsManager::findById(1);
echo "Liste des objets" . "<br>";
$array = TypesproduitsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = TypesproduitsManager::findById(1);
TypesproduitsManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = TypesproduitsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>