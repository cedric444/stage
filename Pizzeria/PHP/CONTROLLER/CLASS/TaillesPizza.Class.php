<?php

class TaillesPizza 
{

	/*****************Attributs***************** */

	private $_idTaillePizza;
	private $_libelleTaillePizza;
	private $_tarifSupplement;

	/***************** Accesseurs ***************** */


	public function getIdTaillePizza()
	{
		return $this->_idTaillePizza;
	}

	public function setIdTaillePizza($idTaillePizza)
	{
		$this->_idTaillePizza=$idTaillePizza;
	}

	public function getLibelleTaillePizza()
	{
		return $this->_libelleTaillePizza;
	}

	public function setLibelleTaillePizza($libelleTaillePizza)
	{
		$this->_libelleTaillePizza=$libelleTaillePizza;
	}

	public function getTarifSupplement()
	{
		return $this->_tarifSupplement;
	}

	public function setTarifSupplement($tarifSupplement)
	{
		$this->_tarifSupplement=$tarifSupplement;
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
		return "IdTaillePizza : ".$this->getIdTaillePizza()."LibelleTaillePizza : ".$this->getLibelleTaillePizza()."TarifSupplement : ".$this->getTarifSupplement()."\n";
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