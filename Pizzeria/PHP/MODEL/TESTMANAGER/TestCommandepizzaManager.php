<?php

//Test CommandepizzaManager

echo "recherche id = 1" . "<br>";
$obj =CommandepizzaManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Commandepizza(["dateCommande" => "([value 1])", "idUser" => "([value 2])", "idLigneDeCommande" => "([value 3])", "quantite" => "([value 4])", "idPizza" => "([value 5])"]);
var_dump(CommandepizzaManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = CommandepizzaManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setdateCommande("[(Value)]");
CommandepizzaManager::update($obj);
$objUpdated = CommandepizzaManager::findById(1);
echo "Liste des objets" . "<br>";
$array = CommandepizzaManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = CommandepizzaManager::findById(1);
CommandepizzaManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = CommandepizzaManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>