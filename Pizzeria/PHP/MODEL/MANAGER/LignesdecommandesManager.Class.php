<?php

class LignesdecommandesManager 
{
	public static function add(Lignesdecommandes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Lignesdecommandes (idCommande,quantite,idProduit,idTaillePizza,idPizza,prix) VALUES (:idCommande,:quantite,:idProduit,:idTaillePizza,:idPizza,:prix)");
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":idTaillePizza", $obj->getIdTaillePizza());
		$q->bindValue(":idPizza", $obj->getIdPizza());
		$q->bindValue(":prix", $obj->getPrix());
		$q->execute();
	}

	public static function update(Lignesdecommandes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Lignesdecommandes SET idLigneDeCommande=:idLigneDeCommande,idCommande=:idCommande,quantite=:quantite,idProduit=:idProduit,idTaillePizza=:idTaillePizza,idPizza=:idPizza,prix=:prix WHERE idLigneDeCommande=:idLigneDeCommande");
		$q->bindValue(":idLigneDeCommande", $obj->getIdLigneDeCommande());
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":idTaillePizza", $obj->getIdTaillePizza());
		$q->bindValue(":idPizza", $obj->getIdPizza());
		$q->bindValue(":prix", $obj->getPrix());
		$q->execute();
	}
	public static function delete(Lignesdecommandes $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Lignesdecommandes WHERE idLigneDeCommande=" .$obj->getIdLigneDeCommande());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Lignesdecommandes WHERE idLigneDeCommande =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Lignesdecommandes($results);
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
		$q = $db->query("SELECT * FROM Lignesdecommandes");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Lignesdecommandes($donnees);
			}
		}
		return $liste;
	}
}