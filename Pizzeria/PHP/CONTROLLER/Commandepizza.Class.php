<?php

class Commandepizza 
{

	/*****************Attributs***************** */

	private $_idCommande;
	private $_dateCommande;
	private $_idUser;
	private $_idLigneDeCommande;
	private $_quantite;
	private $_idPizza;

	/***************** Accesseurs ***************** */


	public function getIdCommande()
	{
		return $this->_idCommande;
	}

	public function setIdCommande($idCommande)
	{
		$this->_idCommande=$idCommande;
	}

	public function getDateCommande()
	{
		return $this->_dateCommande;
	}

	public function setDateCommande($dateCommande)
	{
		$this->_dateCommande=$dateCommande;
	}

	public function getIdUser()
	{
		return $this->_idUser;
	}

	public function setIdUser($idUser)
	{
		$this->_idUser=$idUser;
	}

	public function getIdLigneDeCommande()
	{
		return $this->_idLigneDeCommande;
	}

	public function setIdLigneDeCommande($idLigneDeCommande)
	{
		$this->_idLigneDeCommande=$idLigneDeCommande;
	}

	public function getQuantite()
	{
		return $this->_quantite;
	}

	public function setQuantite($quantite)
	{
		$this->_quantite=$quantite;
	}

	public function getIdPizza()
	{
		return $this->_idPizza;
	}

	public function setIdPizza($idPizza)
	{
		$this->_idPizza=$idPizza;
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
		return "IdCommande : ".$this->getIdCommande()."DateCommande : ".$this->getDateCommande()."IdUser : ".$this->getIdUser()."IdLigneDeCommande : ".$this->getIdLigneDeCommande()."Quantite : ".$this->getQuantite()."IdPizza : ".$this->getIdPizza()."\n";
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