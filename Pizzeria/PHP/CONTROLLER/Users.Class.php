<?php

class Users 
{

	/*****************Attributs***************** */

	private $_idUser;
	private $_nomUser;
	private $_prenomUser;
	private $_adresse;
	private $_codePostal;
	private $_ville;
	private $_mailUser;
	private $_telUser;
	private $_nbPointFidelite;
	private $_idRole;

	/***************** Accesseurs ***************** */


	public function getIdUser()
	{
		return $this->_idUser;
	}

	public function setIdUser($idUser)
	{
		$this->_idUser=$idUser;
	}

	public function getNomUser()
	{
		return $this->_nomUser;
	}

	public function setNomUser($nomUser)
	{
		$this->_nomUser=$nomUser;
	}

	public function getPrenomUser()
	{
		return $this->_prenomUser;
	}

	public function setPrenomUser($prenomUser)
	{
		$this->_prenomUser=$prenomUser;
	}

	public function getAdresse()
	{
		return $this->_adresse;
	}

	public function setAdresse($adresse)
	{
		$this->_adresse=$adresse;
	}

	public function getCodePostal()
	{
		return $this->_codePostal;
	}

	public function setCodePostal($codePostal)
	{
		$this->_codePostal=$codePostal;
	}

	public function getVille()
	{
		return $this->_ville;
	}

	public function setVille($ville)
	{
		$this->_ville=$ville;
	}

	public function getMailUser()
	{
		return $this->_mailUser;
	}

	public function setMailUser($mailUser)
	{
		$this->_mailUser=$mailUser;
	}

	public function getTelUser()
	{
		return $this->_telUser;
	}

	public function setTelUser($telUser)
	{
		$this->_telUser=$telUser;
	}

	public function getNbPointFidelite()
	{
		return $this->_nbPointFidelite;
	}

	public function setNbPointFidelite($nbPointFidelite)
	{
		$this->_nbPointFidelite=$nbPointFidelite;
	}

	public function getIdRole()
	{
		return $this->_idRole;
	}

	public function setIdRole($idRole)
	{
		$this->_idRole=$idRole;
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
		return "IdUser : ".$this->getIdUser()."NomUser : ".$this->getNomUser()."PrenomUser : ".$this->getPrenomUser()."Adresse : ".$this->getAdresse()."CodePostal : ".$this->getCodePostal()."Ville : ".$this->getVille()."MailUser : ".$this->getMailUser()."TelUser : ".$this->getTelUser()."NbPointFidelite : ".$this->getNbPointFidelite()."IdRole : ".$this->getIdRole()."\n";
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