<?php

class Pizzas 
{

	/*****************Attributs***************** */

	private $_idPizza;
	private $_idRecette;
	private $_idTaillePizza;
	private $_prix;

	/***************** Accesseurs ***************** */


	public function getIdPizza()
	{
		return $this->_idPizza;
	}

	public function setIdPizza($idPizza)
	{
		$this->_idPizza=$idPizza;
	}

	public function getIdRecette()
	{
		return $this->_idRecette;
	}

	public function setIdRecette($idRecette)
	{
		$this->_idRecette=$idRecette;
	}

	public function getIdTaillePizza()
	{
		return $this->_idTaillePizza;
	}

	public function setIdTaillePizza($idTaillePizza)
	{
		$this->_idTaillePizza=$idTaillePizza;
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
		return "IdPizza : ".$this->getIdPizza()."IdRecette : ".$this->getIdRecette()."IdTaillePizza : ".$this->getIdTaillePizza()."Prix : ".$this->getPrix()."\n";
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