<?php

class ComporteproduitrecetteManager 
{
	public static function add(Comporteproduitrecette $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Comporteproduitrecette (idRecette,idProduit) VALUES (:idRecette,:idProduit)");
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->execute();
	}

	public static function update(Comporteproduitrecette $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Comporteproduitrecette SET idComporteProduitRecette=:idComporteProduitRecette,idRecette=:idRecette,idProduit=:idProduit WHERE idComporteProduitRecette=:idComporteProduitRecette");
		$q->bindValue(":idComporteProduitRecette", $obj->getIdComporteProduitRecette());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->execute();
	}
	public static function delete(Comporteproduitrecette $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Comporteproduitrecette WHERE idComporteProduitRecette=" .$obj->getIdComporteProduitRecette());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Comporteproduitrecette WHERE idComporteProduitRecette =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Comporteproduitrecette($results);
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
		$q = $db->query("SELECT * FROM Comporteproduitrecette");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Comporteproduitrecette($donnees);
			}
		}
		return $liste;
	}
}