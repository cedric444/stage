<?php

class AllergenesproduitManager 
{
	public static function add(Allergenesproduit $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Allergenesproduit (libelleProduit,idComposition,idAllergene,libelleAllergene) VALUES (:libelleProduit,:idComposition,:idAllergene,:libelleAllergene)");
		$q->bindValue(":libelleProduit", $obj->getLibelleProduit());
		$q->bindValue(":idComposition", $obj->getIdComposition());
		$q->bindValue(":idAllergene", $obj->getIdAllergene());
		$q->bindValue(":libelleAllergene", $obj->getLibelleAllergene());
		$q->execute();
	}

	public static function update(Allergenesproduit $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Allergenesproduit SET idProduit=:idProduit,libelleProduit=:libelleProduit,idComposition=:idComposition,idAllergene=:idAllergene,libelleAllergene=:libelleAllergene WHERE idProduit=:idProduit");
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":libelleProduit", $obj->getLibelleProduit());
		$q->bindValue(":idComposition", $obj->getIdComposition());
		$q->bindValue(":idAllergene", $obj->getIdAllergene());
		$q->bindValue(":libelleAllergene", $obj->getLibelleAllergene());
		$q->execute();
	}
	public static function delete(Allergenesproduit $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Allergenesproduit WHERE idProduit=" .$obj->getIdProduit());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Allergenesproduit WHERE idProduit =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Allergenesproduit($results);
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
		$q = $db->query("SELECT * FROM Allergenesproduit");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Allergenesproduit($donnees);
			}
		}
		return $liste;
	}
	public static function getByProduit($idProduit)
	{
		$db=DbConnect::getDb();
	   $q=$db->query('SELECT * FROM Alergenesproduit WHERE idProduit ="'.$idProduit.'"');
	   $results = $q->fetch(PDO::FETCH_ASSOC);
	   if($results != false)
	   {
		   return new Allergenesproduit($results);
	   }
	   else
	   {
		   return false;
	   }
	   
	}  
}