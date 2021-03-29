<?php

class Recettes 
{

	/*****************Attributs***************** */

	private $_idRecette;
	private $_libelleRecette;
	private $_prixRecette;
	private $_imagePizza;
	private $_dateDebut;
	private $_dateFin;

	/***************** Accesseurs ***************** */


	public function getIdRecette()
	{
		return $this->_idRecette;
	}

	public function setIdRecette($idRecette)
	{
		$this->_idRecette=$idRecette;
	}

	public function getLibelleRecette()
	{
		return $this->_libelleRecette;
	}

	public function setLibelleRecette($libelleRecette)
	{
		$this->_libelleRecette=$libelleRecette;
	}

	public function getPrixRecette()
	{
		return $this->_prixRecette;
	}

	public function setPrixRecette($prixRecette)
	{
		$this->_prixRecette=$prixRecette;
	}

	public function getImagePizza()
	{
		return $this->_imagePizza;
	}

	public function setImagePizza($imagePizza)
	{
		$this->_imagePizza=$imagePizza;
	}

	public function getDateDebut()
	{
		return $this->_dateDebut;
	}

	public function setDateDebut($dateDebut)
	{
		$this->_dateDebut=$dateDebut;
	}

	public function getDateFin()
	{
		return $this->_dateFin;
	}

	public function setDateFin($dateFin)
	{
		$this->_dateFin=$dateFin;
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
		return "IdRecette : ".$this->getIdRecette()."LibelleRecette : ".$this->getLibelleRecette()."PrixRecette : ".$this->getPrixRecette()."ImagePizza : ".$this->getImagePizza()."DateDebut : ".$this->getDateDebut()."DateFin : ".$this->getDateFin()."\n";
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