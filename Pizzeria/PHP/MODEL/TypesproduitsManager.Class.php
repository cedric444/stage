<?php

class TypesproduitsManager 
{
	public static function add(Typesproduits $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Typesproduits (libelleTypeProduit) VALUES (:libelleTypeProduit)");
		$q->bindValue(":libelleTypeProduit", $obj->getLibelleTypeProduit());
		$q->execute();
	}

	public static function update(Typesproduits $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Typesproduits SET idTypeProduit=:idTypeProduit,libelleTypeProduit=:libelleTypeProduit WHERE idTypeProduit=:idTypeProduit");
		$q->bindValue(":idTypeProduit", $obj->getIdTypeProduit());
		$q->bindValue(":libelleTypeProduit", $obj->getLibelleTypeProduit());
		$q->execute();
	}
	public static function delete(Typesproduits $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Typesproduits WHERE idTypeProduit=" .$obj->getIdTypeProduit());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Typesproduits WHERE idTypeProduit =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Typesproduits($results);
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
		$q = $db->query("SELECT * FROM Typesproduits");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Typesproduits($donnees);
			}
		}
		return $liste;
	}
	public static function getByProduit($obj)
	{
		$db=DbConnect::getDb();
	   	$q=$db->query('SELECT * FROM Typesproduits WHERE idProduit="'.$obj.'"');
	   	$results = $q->fetch(PDO::FETCH_ASSOC);
	   	if($results != false)
	   	{
		   	return new Produits($results);
	   	}
	   	else
	   	{
		   	return false;
	   	}
	   
	}
}