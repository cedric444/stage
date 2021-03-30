<?php

//Test AllergenesproduitManager

echo "recherche id = 1" . "<br>";
$obj =AllergenesproduitManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Allergenesproduit(["libelleProduit" => "([value 1])", "idComposition" => "([value 2])", "idAllergene" => "([value 3])", "libelleAllergene" => "([value 4])"]);
var_dump(AllergenesproduitManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = AllergenesproduitManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelleProduit("[(Value)]");
AllergenesproduitManager::update($obj);
$objUpdated = AllergenesproduitManager::findById(1);
echo "Liste des objets" . "<br>";
$array = AllergenesproduitManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = AllergenesproduitManager::findById(1);
AllergenesproduitManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = AllergenesproduitManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>