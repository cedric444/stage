<?php

class RecettesManager 
{
	public static function add(Recettes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Recettes (libelleRecette,prixRecette,imagePizza,dateDebut,dateFin) VALUES (:libelleRecette,:prixRecette,:imagePizza,:dateDebut,:dateFin)");
		$q->bindValue(":libelleRecette", $obj->getLibelleRecette());
		$q->bindValue(":prixRecette", $obj->getPrixRecette());
		$q->bindValue(":imagePizza", $obj->getImagePizza());
		$q->bindValue(":dateDebut", $obj->getDateDebut());
		$q->bindValue(":dateFin", $obj->getDateFin());
		$q->execute();
	}

	public static function update(Recettes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Recettes SET idRecette=:idRecette,libelleRecette=:libelleRecette,prixRecette=:prixRecette,imagePizza=:imagePizza,dateDebut=:dateDebut,dateFin=:dateFin WHERE idRecette=:idRecette");
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":libelleRecette", $obj->getLibelleRecette());
		$q->bindValue(":prixRecette", $obj->getPrixRecette());
		$q->bindValue(":imagePizza", $obj->getImagePizza());
		$q->bindValue(":dateDebut", $obj->getDateDebut());
		$q->bindValue(":dateFin", $obj->getDateFin());
		$q->execute();
	}
	public static function delete(Recettes $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Recettes WHERE idRecette=" .$obj->getIdRecette());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Recettes WHERE idRecette =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Recettes($results);
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
		$q = $db->query("SELECT * FROM Recettes");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Recettes($donnees);
			}
		}
		return $liste;
	}
}