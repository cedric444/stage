<?php
class UtilisateurManager
{
    public static function add(Utilisateur $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO utilisateurs (identifiant,roleUtilisateur) VALUES (:identifiant,:roleUtilisateur)");
        $q->bindValue(":identifiant", $obj->getIdentifiant());
        $q->bindValue(":roleUtilisateur", $obj->getRoleUtilisateur());
        $q->execute();
    }

    public static function update(Utilisateur $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE utilisateurs SET identifiant=:identifiant, roleUtilisateur=:roleUtilisateur WHERE idUtilisateur=:idUtilisateur");
        $q->bindValue(":identifiant", $obj->getIdentifiant());
        $q->bindValue(":roleUtilisateur", $obj->getRoleUtilisateur());
        $q->bindValue(":idUtilisateur", $obj->getIdUtilisateur());
        $q->execute();
    }

    public static function delete(Utilisateur $obj)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM utilisateurs WHERE idUtilisateur=" . $obj->getIdUtilisateur());
    }

    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM utilisateurs WHERE idUtilisateur=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new Utilisateur($results);
        } else {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $tab = [];
        $q = $db->query("SELECT * FROM utilisateurs");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $tab[] = new Utilisateur($donnees);
            }
        }
        return $tab;
    }

// ============================================================================

    public static function getByName($name)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare('SELECT * FROM utilisateurs WHERE identifiant = :identifiant');
        $q->bindValue(':identifiant', $name);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $q->CloseCursor();
        if ($donnees == false) {
            return new Utilisateur();
        } else {
            return new Utilisateur($donnees);
        }

    }

}
