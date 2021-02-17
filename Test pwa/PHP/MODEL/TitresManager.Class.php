<?php

class TitresManager 
{
	public static function add(Titres $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Titres (libelleTitre,idAlbum) VALUES (:libelleTitre,:idAlbum)");
		$q->bindValue(":libelleTitre", $obj->getLibelleTitre());
		$q->bindValue(":idAlbum", $obj->getIdAlbum());
		$q->execute();
	}

	public static function update(Titres $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Titres SET idTitre=:idTitre,libelleTitre=:libelleTitre,idAlbum=:idAlbum WHERE idTitre=:idTitre");
		$q->bindValue(":idTitre", $obj->getIdTitre());
		$q->bindValue(":libelleTitre", $obj->getLibelleTitre());
		$q->bindValue(":idAlbum", $obj->getIdAlbum());
		$q->execute();
	}
	public static function delete(Titres $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Titres WHERE idTitre=" .$obj->getIdTitre());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Titres WHERE idTitre =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Titres($results);
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
		$q = $db->query("SELECT * FROM Titres");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Titres($donnees);
			}
		}
		return $liste;
	}

	public static function getByAlbum($idAlbum)
	{
		$db=DbConnect::getDb();
		$q=$db->query('SELECT * FROM titres WHERE idAlbum ="'.$idAlbum.'"');
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Titres($results);
		}
		else
		{
			return false;
		}
	}
}