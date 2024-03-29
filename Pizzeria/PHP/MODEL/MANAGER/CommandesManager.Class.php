<?php

class CommandesManager 
{
	public static function add(Commandes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Commandes (dateCommande,numCommande,nbPointFidelite,horaireLivraison,idUser) VALUES (:dateCommande, :numCommande, :nbPointFidelite,:horaireLivraison,:idUser)");
		$q->bindVallue(":numCommande", $obj->getNumCommande());
		$q->bindValue(":dateCommande", $obj->getDateCommande());
		$q->bindValue(":nbPointFidelite", $obj->getNbPointFidelite());
		$q->bindValue(":horaireLivraison", $obj->getHoraireLivraison());
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->execute();
	}

	public static function update(Commandes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Commandes SET idCommande=:idCommande,numCommande=:numCommande,dateCommande=:dateCommande,nbPointFidelite=:nbPointFidelite,horaireLivraison=:horaireLivraison,idUser=:idUser WHERE idCommande=:idCommande");
		$q->bindVallue(":numCommande", $obj->getNumCommande());
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->bindValue(":dateCommande", $obj->getDateCommande());
		$q->bindValue(":nbPointFidelite", $obj->getNbPointFidelite());
		$q->bindValue(":horaireLivraison", $obj->getHoraireLivraison());
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->execute();
	}
	public static function delete(Commandes $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Commandes WHERE idCommande=" .$obj->getIdCommande());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Commandes WHERE idCommande =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Commandes($results);
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
		$q = $db->query("SELECT * FROM Commandes");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Commandes($donnees);
			}
		}
		return $liste;
	}
	public static function getByClient($idUser)
	{
		$db=DbConnect::getDb();
	   $q=$db->query('SELECT * FROM commandes WHERE idUser ="'.$idUser.'"');
	   $results = $q->fetch(PDO::FETCH_ASSOC);
	   if($results != false)
	   {
		   return new Commandes($results);
	   }
	   else
	   {
		   return false;
	   }
	   
	}  
	public static function getByDate($dateCommande)
    {
        $db = DbConnect::getDb();
        $dateCommande = (int) $dateCommande;
        $liste = [];
        $q = $db->query("SELECT * FROM commandes where dateCommande=$dateCommande");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            if ($donnees != false)
            {
                $liste[] = new Commandes($donnees);
            }
        }return $liste;

    }
}