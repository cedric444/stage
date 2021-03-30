<?php

//Test ProduitsrecettesManager

echo "recherche id = 1" . "<br>";
$obj =ProduitsrecettesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Produitsrecettes(["libelleProduit" => "([value 1])", "idComporteProduitRecette" => "([value 2])", "idRecette" => "([value 3])", "libelleRecette" => "([value 4])", "imagePizza" => "([value 5])"]);
var_dump(ProduitsrecettesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = ProduitsrecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelleProduit("[(Value)]");
ProduitsrecettesManager::update($obj);
$objUpdated = ProduitsrecettesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = ProduitsrecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = ProduitsrecettesManager::findById(1);
ProduitsrecettesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = ProduitsrecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>