<?php
class User
{
    private $_idUser;
    private $_nom;
    private $_prenom;
    private $_role;

    public function getIdUser()
    {
        return $this->_idUser;
    }
    public function setIdUser($_idUser)
    {
        return $this->_idUser = $_idUser;
    }
    public function getNom()
    {
        return $this->_nom;
    }
    public function setNom($_nom)
    {
        return $this->_nom = $_nom;
    }
    public function getPrenom()
    {
        return $this->_prenom;
    }
    public function setPrenom($_prenom)
    {
        return $this->_prenom = $_prenom;
    }
    public function getRole()
    {
        return $this->_role;
    }
    public function setRole($_role)
    {
        return $this->_role = $_role;
    }

    public function __construct(array $options = [])
    {
        if (!empty($options)) {
            $this->hydrate($options);
        }
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $methode = "set" . ucfirst($key);
            if (is_callable(([$this, $methode]))) {
                $this->$methode($value);
            }
        }
    }

}
