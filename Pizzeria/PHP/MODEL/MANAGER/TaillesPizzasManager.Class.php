<?php

class TaillesPizzasManager 
{
	public static function add(TaillesPizza $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Taillespizzas (libelleTaillePizza,tarifSupplement) VALUES (:libelleTaillePizza,:tarifSupplement)");
		$q->bindValue(":libelleTaillePizza", $obj->getLibelleTaillePizza());
		$q->bindValue(":tarifSupplement", $obj->getTarifSupplement());
		$q->execute();
	}

	public static function update(TaillesPizza $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Taillespizzas SET idTaillePizza=:idTaillePizza,libelleTaillePizza=:libelleTaillePizza,tarifSupplement=:tarifSupplement WHERE idTaillePizza=:idTaillePizza");
		$q->bindValue(":idTaillePizza", $obj->getIdTaillePizza());
		$q->bindValue(":libelleTaillePizza", $obj->getLibelleTaillePizza());
		$q->bindValue(":tarifSupplement", $obj->getTarifSupplement());
		$q->execute();
	}
	public static function delete(TaillesPizza $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Taillespizzas WHERE idTaillePizza=" .$obj->getIdTaillePizza());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Taillespizzas WHERE idTaillePizza =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new TaillesPizza($results);
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
		$q = $db->query("SELECT * FROM Taillespizzas");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new TaillesPizza($donnees);
			}
		}
		return $liste;
	}
}