<?php

class Commandes 
{

	/*****************Attributs***************** */

	private $_idCommande;
	private $_dateCommande;
	private $_nbPointFidelite;
	private $_horaireLivraison;
	private $_idUser;

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

	public function getNbPointFidelite()
	{
		return $this->_nbPointFidelite;
	}

	public function setNbPointFidelite($nbPointFidelite)
	{
		$this->_nbPointFidelite=$nbPointFidelite;
	}

	public function getHoraireLivraison()
	{
		return $this->_horaireLivraison;
	}

	public function setHoraireLivraison($horaireLivraison)
	{
		$this->_horaireLivraison=$horaireLivraison;
	}

	public function getIdUser()
	{
		return $this->_idUser;
	}

	public function setIdUser($idUser)
	{
		$this->_idUser=$idUser;
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
		return "IdCommande : ".$this->getIdCommande()."DateCommande : ".$this->getDateCommande()."NbPointFidelite : ".$this->getNbPointFidelite()."HoraireLivraison : ".$this->getHoraireLivraison()."IdUser : ".$this->getIdUser()."\n";
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