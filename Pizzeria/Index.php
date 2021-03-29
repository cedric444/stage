<?php

require("./Outils.php");

Parametres::init();

DbConnect::init();

session_start();

/******Les langues******/
/***On récupère la langue***/
if (isset($_GET['lang']))
{
	$_SESSION['lang'] = $_GET['lang'];
}

/***On récupère la langue de la session/FR par défaut***/
$lang=isset($_SESSION['lang']) ? $_SESSION['lang'] : 'FR';
/******Fin des langues******/

$routes=[
	"default"=>["PHP/VIEW/","accueil","Accueil"],
	"TestallergenesManager"=>["PHP/MODEL/TESTMANAGER/","TestallergenesManager","Test de allergenes"],
	"TestcommandesManager"=>["PHP/MODEL/TESTMANAGER/","TestcommandesManager","Test de commandes"],
	"TestcomporteproduitrecetteManager"=>["PHP/MODEL/TESTMANAGER/","TestcomporteproduitrecetteManager","Test de comporteproduitrecette"],
	"TestcompositionsManager"=>["PHP/MODEL/TESTMANAGER/","TestcompositionsManager","Test de compositions"],
	"TestlignesdecommandesManager"=>["PHP/MODEL/TESTMANAGER/","TestlignesdecommandesManager","Test de lignesdecommandes"],
	"TestpizzasManager"=>["PHP/MODEL/TESTMANAGER/","TestpizzasManager","Test de pizzas"],
	"TestproduitsManager"=>["PHP/MODEL/TESTMANAGER/","TestproduitsManager","Test de produits"],
	"TestrecettesManager"=>["PHP/MODEL/TESTMANAGER/","TestrecettesManager","Test de recettes"],
	"TestrolesManager"=>["PHP/MODEL/TESTMANAGER/","TestrolesManager","Test de roles"],
	"TesttaillespizzasManager"=>["PHP/MODEL/TESTMANAGER/","TesttaillespizzasManager","Test de taillespizzas"],
	"TesttypesproduitsManager"=>["PHP/MODEL/TESTMANAGER/","TesttypesproduitsManager","Test de typesproduits"],
	"TestusersManager"=>["PHP/MODEL/TESTMANAGER/","TestusersManager","Test de users"],
];

if(isset($_GET["page"]))
{

	$page=$_GET["page"];

	if(isset($routes[$page]))
	{
		AfficherPage($routes[$page]);
	}
	else
	{
		AfficherPage($routes["default"]);
	}
}
else
{
	AfficherPage($routes["default"]);
}