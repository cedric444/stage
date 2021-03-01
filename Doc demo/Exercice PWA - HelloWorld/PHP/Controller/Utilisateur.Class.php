<?php
class Utilisateur
{
    private $_idUtilisateur;
    private $_identifiant;
    private $_roleUtilisateur;

    public function getIdUtilisateur()
    {
        return $this->_idUtilisateur;
    }
    public function setIdUtilisateur($_idUtilisateur)
    {
        return $this->_idUtilisateur = $_idUtilisateur;
    }
    public function getIdentifiant()
    {
        return $this->_identifiant;
    }
    public function setIdentifiant($_identifiant)
    {
        return $this->_identifiant = $_identifiant;
    }
    public function getRoleUtilisateur()
    {
        return $this->_roleUtilisateur;
    }
    public function setRoleUtilisateur($_roleUtilisateur)
    {
        return $this->_roleUtilisateur = $_roleUtilisateur;
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
