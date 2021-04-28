<?php

class AllergenesManager 
{
	public static function add(Allergenes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Allergenes (libelleAllergene) VALUES (:libelleAllergene)");
		$q->bindValue(":libelleAllergene", $obj->getLibelleAllergene());
		$q->execute();
	}

	public static function update(Allergenes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Allergenes SET idAllergene=:idAllergene,libelleAllergene=:libelleAllergene WHERE idAllergene=:idAllergene");
		$q->bindValue(":idAllergene", $obj->getIdAllergene());
		$q->bindValue(":libelleAllergene", $obj->getLibelleAllergene());
		$q->execute();
	}
	public static function delete(Allergenes $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Allergenes WHERE idAllergene=" .$obj->getIdAllergene());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Allergenes WHERE idAllergene =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Allergenes($results);
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
		$q = $db->query("SELECT * FROM Allergenes");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Allergenes($donnees);
			}
		}
		return $liste;
	}
}