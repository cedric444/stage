<?php

class Comporteproduitrecette 
{

	/*****************Attributs***************** */

	private $_idComporteProduitRecette;
	private $_idRecette;
	private $_idProduit;
	private $_quantiteProduitPizza;

	/***************** Accesseurs ***************** */


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

	public function getIdProduit()
	{
		return $this->_idProduit;
	}

	public function setIdProduit($idProduit)
	{
		$this->_idProduit=$idProduit;
	}

	public function getQuantiteProduitPizza()
	{
		return $this->_quantiteProduitPizza;
	}

	public function setQuantiteProduitPizza($quantiteProduitPizza)
	{
		$this->_quantiteProduitPizza=$quantiteProduitPizza;
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
		return "IdComporteProduitRecette : ".$this->getIdComporteProduitRecette()."IdRecette : ".$this->getIdRecette()."IdProduit : ".$this->getIdProduit()."QuantiteProduitPizza : ".$this->getQuantiteProduitPizza()."\n";
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