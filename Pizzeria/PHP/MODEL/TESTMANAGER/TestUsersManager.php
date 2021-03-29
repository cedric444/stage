<?php

//Test UsersManager

echo "recherche id = 1" . "<br>";
$obj =UsersManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Users(["nomUser" => "([value 1])", "prenomUser" => "([value 2])", "adresse" => "([value 3])", "codePostal" => "([value 4])", "ville" => "([value 5])", "mailUser" => "([value 6])", "telUser" => "([value 7])", "nbPointFidelite" => "([value 8])", "idRole" => "([value 9])"]);
var_dump(UsersManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = UsersManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setnomUser("[(Value)]");
UsersManager::update($obj);
$objUpdated = UsersManager::findById(1);
echo "Liste des objets" . "<br>";
$array = UsersManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = UsersManager::findById(1);
UsersManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = UsersManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>