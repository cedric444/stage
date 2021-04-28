<?php

class PizzasManager 
{
	public static function add(Pizzas $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Pizzas (idRecette,idTaillePizza,prix) VALUES (:idRecette,:idTaillePizza,:prix)");
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idTaillePizza", $obj->getIdTaillePizza());
		$q->bindValue(":prix", $obj->getPrix());
		$q->execute();
	}

	public static function update(Pizzas $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Pizzas SET idPizza=:idPizza,idRecette=:idRecette,idTaillePizza=:idTaillePizza,prix=:prix WHERE idPizza=:idPizza");
		$q->bindValue(":idPizza", $obj->getIdPizza());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idTaillePizza", $obj->getIdTaillePizza());
		$q->bindValue(":prix", $obj->getPrix());
		$q->execute();
	}
	public static function delete(Pizzas $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Pizzas WHERE idPizza=" .$obj->getIdPizza());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Pizzas WHERE idPizza =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Pizzas($results);
		}
		else
		{
			return false;
		}
	}
	public static function getList()
	{
 		$db=DbConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT * FROM Pizzas");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Pizzas($donnees);
			}
		}
		return $liste;
	}
}