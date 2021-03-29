<?php

//Test CompositionsManager

echo "recherche id = 1" . "<br>";
$obj =CompositionsManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Compositions(["idProduit" => "([value 1])", "idAllergene" => "([value 2])"]);
var_dump(CompositionsManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = CompositionsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setidProduit("[(Value)]");
CompositionsManager::update($obj);
$objUpdated = CompositionsManager::findById(1);
echo "Liste des objets" . "<br>";
$array = CompositionsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = CompositionsManager::findById(1);
CompositionsManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = CompositionsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>