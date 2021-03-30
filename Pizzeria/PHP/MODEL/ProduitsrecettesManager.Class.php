<?php

class ProduitsrecettesManager 
{
	public static function add(Produitsrecettes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Produitsrecettes (libelleProduit,idComporteProduitRecette,idRecette,libelleRecette,imagePizza) VALUES (:libelleProduit,:idComporteProduitRecette,:idRecette,:libelleRecette,:imagePizza)");
		$q->bindValue(":libelleProduit", $obj->getLibelleProduit());
		$q->bindValue(":idComporteProduitRecette", $obj->getIdComporteProduitRecette());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":libelleRecette", $obj->getLibelleRecette());
		$q->bindValue(":imagePizza", $obj->getImagePizza());
		$q->execute();
	}

	public static function update(Produitsrecettes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Produitsrecettes SET idProduit=:idProduit,libelleProduit=:libelleProduit,idComporteProduitRecette=:idComporteProduitRecette,idRecette=:idRecette,libelleRecette=:libelleRecette,imagePizza=:imagePizza WHERE idProduit=:idProduit");
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":libelleProduit", $obj->getLibelleProduit());
		$q->bindValue(":idComporteProduitRecette", $obj->getIdComporteProduitRecette());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":libelleRecette", $obj->getLibelleRecette());
		$q->bindValue(":imagePizza", $obj->getImagePizza());
		$q->execute();
	}
	public static function delete(Produitsrecettes $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Produitsrecettes WHERE idProduit=" .$obj->getIdProduit());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Produitsrecettes WHERE idProduit =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Produitsrecettes($results);
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
		$q = $db->query("SELECT * FROM Produitsrecettes");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Produitsrecettes($donnees);
			}
		}
		return $liste;
	}
}