<?php
$role = $_SESSION['user']->getIdRole();
if($role == 1)
{
    header("location:index.php?page=InterfaceDonnees");
}
else
{
    header("location:index.php?page=Menu");
}