<?php

//Test ComporteproduitrecetteManager

echo "recherche id = 1" . "<br>";
$obj =ComporteproduitrecetteManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Comporteproduitrecette(["idRecette" => "([value 1])", "idProduit" => "([value 2])", "quantiteProduitPizza" => "([value 3])"]);
var_dump(ComporteproduitrecetteManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = ComporteproduitrecetteManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setidRecette("[(Value)]");
ComporteproduitrecetteManager::update($obj);
$objUpdated = ComporteproduitrecetteManager::findById(1);
echo "Liste des objets" . "<br>";
$array = ComporteproduitrecetteManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = ComporteproduitrecetteManager::findById(1);
ComporteproduitrecetteManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = ComporteproduitrecetteManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>