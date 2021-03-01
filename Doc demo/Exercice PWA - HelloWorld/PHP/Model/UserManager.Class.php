<?php
class UserManager
{
    public static function add(User $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO users (nom,prenom,role) VALUES (:nom,:prenom,:role)");
        $q->bindValue(":nom", $obj->getNom());
        $q->bindValue(":prenom", $obj->getPrenom());
        $q->bindValue(":role", $obj->getRole());
        $q->execute();
    }

    public static function update(User $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE users SET nom=:nom, prenom=:prenom, role=:role WHERE idUser=:idUser");
        $q->bindValue(":nom", $obj->getNom());
        $q->bindValue(":prenom", $obj->getPrenom());
        $q->bindValue(":role", $obj->getRole());
        $q->bindValue(":idUser", $obj->getIdUser());
        $q->execute();
    }

    public static function delete(User $obj)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM users WHERE idUser=" . $obj->getIdUser());
    }

    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM users WHERE idUser=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new User($results);
        } else {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $tab = [];
        $q = $db->query("SELECT * FROM users");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $tab[] = new User($donnees);
            }
        }
        return $tab;
    }

}
