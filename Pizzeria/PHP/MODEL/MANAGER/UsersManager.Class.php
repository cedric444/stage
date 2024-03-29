<?php

class UsersManager 
{
	public static function add(Users $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Users (nomUser,prenomUser,adresse,codePostal,ville,mailUser,telUser,motDePasse,nbPointFidelite,idRole) VALUES (:nomUser,:prenomUser,:adresse,:codePostal,:ville,:mailUser,:telUser,:motDePasse,:nbPointFidelite,:idRole)");
		$q->bindValue(":nomUser", $obj->getNomUser());
		$q->bindValue(":prenomUser", $obj->getPrenomUser());
		$q->bindValue(":adresse", $obj->getAdresse());
		$q->bindValue(":codePostal", $obj->getCodePostal());
		$q->bindValue(":ville", $obj->getVille());
		$q->bindValue(":mailUser", $obj->getMailUser());
		$q->bindValue(":telUser", $obj->getTelUser());
		$q->bindValue(":motDePasse", $obj->getMotDePasse());
		$q->bindValue(":nbPointFidelite", $obj->getNbPointFidelite());
		$q->bindValue(":idRole", $obj->getIdRole());
		$q->execute();
	}

	public static function update(Users $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Users SET idUser=:idUser,nomUser=:nomUser,prenomUser=:prenomUser,adresse=:adresse,codePostal=:codePostal,ville=:ville,mailUser=:mailUser,telUser=:telUser,motDePasse=:motDePasse,nbPointFidelite=:nbPointFidelite,idRole=:idRole WHERE idUser=:idUser");
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->bindValue(":nomUser", $obj->getNomUser());
		$q->bindValue(":prenomUser", $obj->getPrenomUser());
		$q->bindValue(":adresse", $obj->getAdresse());
		$q->bindValue(":codePostal", $obj->getCodePostal());
		$q->bindValue(":ville", $obj->getVille());
		$q->bindValue(":mailUser", $obj->getMailUser());
		$q->bindValue(":telUser", $obj->getTelUser());
		$q->bindValue(":motDePasse", $obj->getMotDePasse());
		$q->bindValue(":nbPointFidelite", $obj->getNbPointFidelite());
		$q->bindValue(":idRole", $obj->getIdRole());
		$q->execute();
	}
	public static function delete(Users $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Users WHERE idUser=" .$obj->getIdUser());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Users WHERE idUser =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Users($results);
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
		$q = $db->query("SELECT * FROM Users");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Users($donnees);
			}
		}
		return $liste;
	}
	public static function getByEmail($email)
	{
		$db=DbConnect::getDb();
	   $q=$db->query('SELECT * FROM users WHERE mailUser ="'.$email.'"');
	   $results = $q->fetch(PDO::FETCH_ASSOC);
	   if($results != false)
	   {
		   return new Users($results);
	   }
	   else
	   {
		   return false;
	   }
	}
}