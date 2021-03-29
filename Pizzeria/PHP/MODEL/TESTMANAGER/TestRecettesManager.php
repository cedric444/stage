<?php

//Test RecettesManager

echo "recherche id = 1" . "<br>";
$obj =RecettesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Recettes(["libelleRecette" => "([value 1])", "prixRecette" => "([value 2])", "imagePizza" => "([value 3])", "dateDebut" => "([value 4])", "dateFin" => "([value 5])"]);
var_dump(RecettesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = RecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelleRecette("[(Value)]");
RecettesManager::update($obj);
$objUpdated = RecettesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = RecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = RecettesManager::findById(1);
RecettesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = RecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>