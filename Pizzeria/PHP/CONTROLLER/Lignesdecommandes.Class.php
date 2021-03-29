<?php

class Lignesdecommandes 
{

	/*****************Attributs***************** */

	private $_idLigneDeCommande;
	private $_idCommande;
	private $_quantite;
	private $_idProduit;
	private $_idTaillePizza;
	private $_idPizza;
	private $_prix;

	/***************** Accesseurs ***************** */


	public function getIdLigneDeCommande()
	{
		return $this->_idLigneDeCommande;
	}

	public function setIdLigneDeCommande($idLigneDeCommande)
	{
		$this->_idLigneDeCommande=$idLigneDeCommande;
	}

	public function getIdCommande()
	{
		return $this->_idCommande;
	}

	public function setIdCommande($idCommande)
	{
		$this->_idCommande=$idCommande;
	}

	public function getQuantite()
	{
		return $this->_quantite;
	}

	public function setQuantite($quantite)
	{
		$this->_quantite=$quantite;
	}

	public function getIdProduit()
	{
		return $this->_idProduit;
	}

	public function setIdProduit($idProduit)
	{
		$this->_idProduit=$idProduit;
	}

	public function getIdTaillePizza()
	{
		return $this->_idTaillePizza;
	}

	public function setIdTaillePizza($idTaillePizza)
	{
		$this->_idTaillePizza=$idTaillePizza;
	}

	public function getIdPizza()
	{
		return $this->_idPizza;
	}

	public function setIdPizza($idPizza)
	{
		$this->_idPizza=$idPizza;
	}

	public function getPrix()
	{
		return $this->_prix;
	}

	public function setPrix($prix)
	{
		$this->_prix=$prix;
	}

	/*****************Constructeur***************** */

	public function __construct(array $options = [])
	{
 		if (!empty($options)) // empty : renvoi vrai si le tableau est vide
		{
			$this->hydrate($options);
		}
	}
	public function hydrate($data)
	{
 		foreach ($data as $key => $value)
		{
 			$methode = "set".ucfirst($key); //ucfirst met la 1ere lettre en majuscule
			if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
			{
				$this->$methode($value);
			}
		}
	}

	/*****************Autres Méthodes***************** */

	/**
	* Transforme l'objet en chaine de caractères
	*
	* @return String
	*/
	public function toString()
	{
		return "IdLigneDeCommande : ".$this->getIdLigneDeCommande()."IdCommande : ".$this->getIdCommande()."Quantite : ".$this->getQuantite()."IdProduit : ".$this->getIdProduit()."IdTaillePizza : ".$this->getIdTaillePizza()."IdPizza : ".$this->getIdPizza()."Prix : ".$this->getPrix()."\n";
	}


	
	/* Renvoit Vrai si lobjet en paramètre est égal 
	* à l'objet appelant
	*
	* @param [type] $obj
	* @return bool
	*/
	public function equalsTo($obj)
	{
		return;
	}


	/**
	* Compare l'objet à un autre
	* Renvoi 1 si le 1er est >
	*        0 si ils sont égaux
	*      - 1 si le 1er est <
	*
	* @param [type] $obj1
	* @param [type] $obj2
	* @return Integer
	*/
	public function compareTo($obj)
	{
		return;
	}
}