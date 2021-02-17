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
	"TestalbumsManager"=>["PHP/MODEL/TESTMANAGER/","TestalbumsManager","Test de albums"],
	"TesttitresManager"=>["PHP/MODEL/TESTMANAGER/","TesttitresManager","Test de titres"],
	"ListeAlbums"=>["PHP/VIEW/", "ListeAlbums", "Liste albums"],
	"ListeTitres"=>["PHP/VIEW/", "ListeTitres", "Liste titres"],
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