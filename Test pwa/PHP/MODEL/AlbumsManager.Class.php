<?php

class AlbumsManager 
{
	public static function add(Albums $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Albums (nomAlbum,AnneeAlbum) VALUES (:nomAlbum,:AnneeAlbum)");
		$q->bindValue(":nomAlbum", $obj->getNomAlbum());
		$q->bindValue(":AnneeAlbum", $obj->getAnneeAlbum());
		$q->execute();
	}

	public static function update(Albums $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Albums SET idAlbum=:idAlbum,nomAlbum=:nomAlbum,AnneeAlbum=:AnneeAlbum WHERE idAlbum=:idAlbum");
		$q->bindValue(":idAlbum", $obj->getIdAlbum());
		$q->bindValue(":nomAlbum", $obj->getNomAlbum());
		$q->bindValue(":AnneeAlbum", $obj->getAnneeAlbum());
		$q->execute();
	}
	public static function delete(Albums $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Albums WHERE idAlbum=" .$obj->getIdAlbum());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Albums WHERE idAlbum =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Albums($results);
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
		$q = $db->query("SELECT * FROM Albums");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Albums($donnees);
			}
		}
		return $liste;
	}
}