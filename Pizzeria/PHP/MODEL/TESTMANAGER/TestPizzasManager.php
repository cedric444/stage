<?php

//Test PizzasManager

echo "recherche id = 1" . "<br>";
$obj =PizzasManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Pizzas(["idRecette" => "([value 1])", "idTaillePizza" => "([value 2])", "prix" => "([value 3])"]);
var_dump(PizzasManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = PizzasManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setidRecette("[(Value)]");
PizzasManager::update($obj);
$objUpdated = PizzasManager::findById(1);
echo "Liste des objets" . "<br>";
$array = PizzasManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = PizzasManager::findById(1);
PizzasManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = PizzasManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>