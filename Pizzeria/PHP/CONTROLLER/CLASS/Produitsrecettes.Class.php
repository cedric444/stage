<?php

class Produitsrecettes 
{

	/*****************Attributs***************** */

	private $_idProduit;
	private $_libelleProduit;
	private $_idComporteProduitRecette;
	private $_idRecette;
	private $_libelleRecette;
	private $_imagePizza;

	/***************** Accesseurs ***************** */


	public function getIdProduit()
	{
		return $this->_idProduit;
	}

	public function setIdProduit($idProduit)
	{
		$this->_idProduit=$idProduit;
	}

	public function getLibelleProduit()
	{
		return $this->_libelleProduit;
	}

	public function setLibelleProduit($libelleProduit)
	{
		$this->_libelleProduit=$libelleProduit;
	}

	public function getIdComporteProduitRecette()
	{
		return $this->_idComporteProduitRecette;
	}

	public function setIdComporteProduitRecette($idComporteProduitRecette)
	{
		$this->_idComporteProduitRecette=$idComporteProduitRecette;
	}

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

	public function getImagePizza()
	{
		return $this->_imagePizza;
	}

	public function setImagePizza($imagePizza)
	{
		$this->_imagePizza=$imagePizza;
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
		return "IdProduit : ".$this->getIdProduit()."LibelleProduit : ".$this->getLibelleProduit()."IdComporteProduitRecette : ".$this->getIdComporteProduitRecette()."IdRecette : ".$this->getIdRecette()."LibelleRecette : ".$this->getLibelleRecette()."ImagePizza : ".$this->getImagePizza()."\n";
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