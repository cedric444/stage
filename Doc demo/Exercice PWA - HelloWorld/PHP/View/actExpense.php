<?php
$mode = $_GET['m'];

switch ($mode) {
    case 1:
        $data = new Expense($_POST);
        ExpenseManager::add($data);
        break;

    case 2:
        $data = ExpenseManager::findById($_GET['id']);
        ExpenseManager::delete($data);
        break;
}
header('location: index.php?a=test');
