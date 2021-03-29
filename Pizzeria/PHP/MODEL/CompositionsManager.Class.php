<?php

class CompositionsManager 
{
	public static function add(Compositions $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Compositions (idProduit,idAllergene) VALUES (:idProduit,:idAllergene)");
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":idAllergene", $obj->getIdAllergene());
		$q->execute();
	}

	public static function update(Compositions $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Compositions SET idComposition=:idComposition,idProduit=:idProduit,idAllergene=:idAllergene WHERE idComposition=:idComposition");
		$q->bindValue(":idComposition", $obj->getIdComposition());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":idAllergene", $obj->getIdAllergene());
		$q->execute();
	}
	public static function delete(Compositions $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Compositions WHERE idComposition=" .$obj->getIdComposition());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Compositions WHERE idComposition =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Compositions($results);
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
		$q = $db->query("SELECT * FROM Compositions");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Compositions($donnees);
			}
		}
		return $liste;
	}
}