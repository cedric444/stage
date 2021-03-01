<?php
class ExpenseManager
{
    public static function add(Expense $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO expenses (sum,idUser) VALUES (:sum,:idUser)");
        $q->bindValue(":sum", $obj->getSum());
        $q->bindValue(":idUser", $obj->getidUser());
        $q->execute();
    }

    public static function update(Expense $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE expenses SET sum=:sum, idUser=:idUser WHERE idExpense=:idExpense");
        $q->bindValue(":sum", $obj->getSum());
        $q->bindValue(":idUser", $obj->getidUser());
        $q->bindValue(":idExpense", $obj->getIdExpense());
        $q->execute();
    }

    public static function delete(Expense $obj)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM expenses WHERE idExpense=" . $obj->getIdExpense());
    }

    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM expenses WHERE idExpense=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new Expense($results);
        } else {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $tab = [];
        $q = $db->query("SELECT * FROM expenses");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $tab[] = new Expense($donnees);
            }
        }
        return $tab;
    }

    public static function getListbyUser($id)
    {
        $db = DbConnect::getDb();
        $tab = [];
        $q = $db->query("SELECT * FROM expenses WHERE idUser = ". $id);
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $tab[] = new Expense($donnees);
            }
        }
        return $tab;
    }

}
