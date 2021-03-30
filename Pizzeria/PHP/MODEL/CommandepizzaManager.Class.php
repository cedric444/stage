<?php

class CommandepizzaManager 
{
	public static function add(Commandepizza $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Commandepizza (dateCommande,idUser,idLigneDeCommande,quantite,idPizza) VALUES (:dateCommande,:idUser,:idLigneDeCommande,:quantite,:idPizza)");
		$q->bindValue(":dateCommande", $obj->getDateCommande());
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->bindValue(":idLigneDeCommande", $obj->getIdLigneDeCommande());
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":idPizza", $obj->getIdPizza());
		$q->execute();
	}

	public static function update(Commandepizza $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Commandepizza SET idCommande=:idCommande,dateCommande=:dateCommande,idUser=:idUser,idLigneDeCommande=:idLigneDeCommande,quantite=:quantite,idPizza=:idPizza WHERE idCommande=:idCommande");
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->bindValue(":dateCommande", $obj->getDateCommande());
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->bindValue(":idLigneDeCommande", $obj->getIdLigneDeCommande());
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":idPizza", $obj->getIdPizza());
		$q->execute();
	}
	public static function delete(Commandepizza $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Commandepizza WHERE idCommande=" .$obj->getIdCommande());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Commandepizza WHERE idCommande =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Commandepizza($results);
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
		$q = $db->query("SELECT * FROM Commandepizza");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Commandepizza($donnees);
			}
		}
		return $liste;
	}
	public static function getByPizza($idPizza)
	{
		$db=DbConnect::getDb();
	   $q=$db->query('SELECT * FROM commandepizza WHERE idPizza="'.$idPizza.'"');
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