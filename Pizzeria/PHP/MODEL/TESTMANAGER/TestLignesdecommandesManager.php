<?php

//Test LignesdecommandesManager

echo "recherche id = 1" . "<br>";
$obj =LignesdecommandesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Lignesdecommandes(["idCommande" => "([value 1])", "quantite" => "([value 2])", "idProduit" => "([value 3])", "idTaillePizza" => "([value 4])", "idPizza" => "([value 5])", "prix" => "([value 6])"]);
var_dump(LignesdecommandesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = LignesdecommandesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setidCommande("[(Value)]");
LignesdecommandesManager::update($obj);
$objUpdated = LignesdecommandesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = LignesdecommandesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = LignesdecommandesManager::findById(1);
LignesdecommandesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = LignesdecommandesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>