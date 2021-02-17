<?php

class Albums 
{

	/*****************Attributs***************** */

	private $_idAlbum;
	private $_nomAlbum;
	private $_AnneeAlbum;

	/***************** Accesseurs ***************** */


	public function getIdAlbum()
	{
		return $this->_idAlbum;
	}

	public function setIdAlbum($idAlbum)
	{
		$this->_idAlbum=$idAlbum;
	}

	public function getNomAlbum()
	{
		return $this->_nomAlbum;
	}

	public function setNomAlbum($nomAlbum)
	{
		$this->_nomAlbum=$nomAlbum;
	}

	public function getAnneeAlbum()
	{
		return $this->_AnneeAlbum;
	}

	public function setAnneeAlbum($AnneeAlbum)
	{
		$this->_AnneeAlbum=$AnneeAlbum;
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
		return "IdAlbum : ".$this->getIdAlbum()."NomAlbum : ".$this->getNomAlbum()."AnneeAlbum : ".$this->getAnneeAlbum()."\n";
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