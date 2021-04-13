<?php

class ProduitsManager 
{
	public static function add(Produits $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Produits (libelleProduit,idTypeProduit,prixProduit,quantite,image) VALUES (:libelleProduit,:idTypeProduit,:prixProduit,:quantite,:image)");
		$q->bindValue(":libelleProduit", $obj->getLibelleProduit());
		$q->bindValue(":idTypeProduit", $obj->getIdTypeProduit());
		$q->bindValue(":prixProduit", $obj->getPrixProduit());
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":image", $obj->getImage());
		$q->execute();
	}

	public static function update(Produits $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Produits SET idProduit=:idProduit,libelleProduit=:libelleProduit,idTypeProduit=:idTypeProduit,prixProduit=:prixProduit,quantite=:quantite,image=:image WHERE idProduit=:idProduit");
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":libelleProduit", $obj->getLibelleProduit());
		$q->bindValue(":idTypeProduit", $obj->getIdTypeProduit());
		$q->bindValue(":prixProduit", $obj->getPrixProduit());
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":image", $obj->getImage());
		$q->execute();
	}
	public static function delete($id)
	{
 		$db=DbConnect::getDb();
		$id=(int) $id;
		var_dump($id); 
		$db->exec("DELETE FROM Produits WHERE idProduit=" .$id);
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Produits WHERE idProduit =".$id);
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
	public static function getList()
	{
 		$db=DbConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT * FROM Produits");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Produits($donnees);
			}
		}
		return $liste;
	}
	public static function getByTypeProduit($idTypeProduit)
    {
        $db = DbConnect::getDb();
        $idTypeProduit = (int) $idTypeProduit;
        $liste = [];
        $q = $db->query("SELECT * FROM Produits where idTypeProduit = $idTypeProduit");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            if ($donnees != false)
            {
                $liste[] = new Produits($donnees);
            }
        }return $liste;

    }
}