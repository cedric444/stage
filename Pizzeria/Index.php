<?php

require("./PHP/CONTROLLER/Outils.php");

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
	"default"=>["PHP/VIEW/GENERAL/","Accueil","Accueil",false],

	/***global***/
	"Menu"=>["PHP/VIEW/GENERAL/", "Menu", "Menu",false],
	"InterfaceDonnees"=>["PHP/VIEW/GENERAL/", "InterfaceDonnees", "Interface de l'administrateur",false],
	"InterfaceUser"=>["PHP/VIEW/GENERAL/", "InterfaceUser", "Interface de l'utilisateur",false],
	"SelectionPizzas"=>["PHP/VIEW/GENERAL/", "SelectionPizzas", "page de sélection des pizzas",false],
	"SelectionBoissons"=>["PHP/VIEW/GENERAL/", "SelectionBoissons", "page de selection des boissons",false],
	"SelectionDesserts"=>["PHP/VIEW/GENERAL/", "SelectionDesserts", "page de selection des desserts",false],

	/****Actions****/
	"ActionConnexion"=>["PHP/CONTROLLER/ACTION/", "ActionConnexion", "Action sur la connexion",false],
	"ActionUser"=>["PHP/CONTROLLER/ACTION/", "ActionUser", "Action sur les utilisateurs",false],
	"ActionRole"=>["PHP/CONTROLLER/ACTION/", "ActionRole", "Action sur les rôles",false],
	"ActionTypeProduit"=>["PHP/CONTROLLER/ACTION/", "ActionTypeProduit", "Action sur les types de produits",false],
	"ActionAllergene"=>["PHP/CONTROLLER/ACTION/", "ActionAllergene", "Action sur les allergenes",false],
	"ActionProduit"=>["PHP/CONTROLLER/ACTION/", "ActionProduit", "Action sur les produits",false],
	"ActionRecette"=>["PHP/CONTROLLER/ACTION/", "ActionRecette", "Action sur les recettes",false],
	"ActionCommande"=>["PHP/CONTROLLER/ACTION/", "ActionCommande", "Action sur la commande",false],
	"ActionTaillePizza"=>["PHP/CONTROLLER/ACTION/", "ActionTaillePizza", "Action sur les tailles de pizza",false],

	/****Formulaires*****/
	"FormUser"=>["PHP/VIEW/FORM/", "FormUser", "formulaire utilisateur",false],
	"FormConnexion"=>["PHP/VIEW/FORM/", "FormConnexion", "Formulaire  de connexion",false],
	"FormRole"=>["PHP/VIEW/FORM/", "FormRole", "Formulaire des rôles",false],
	"FormTypeProduit"=>["PHP/VIEW/FORM/", "FormTypeProduit", "Formulaire de types de produits",false],
	"FormAllergene"=>["PHP/VIEW/FORM/", "FormAllergene", "Formulaire des allergenes",false],
	"FormProduit"=>["PHP/VIEW/FORM/", "FormProduit", "Formulaire des produits",false],
	"FormRecette"=>["PHP/VIEW/FORM/", "FormRecette", "Formulaire des recettes",false],
	"FormComporteProduitRecette"=>["PHP/VIEW/FORM/", "FormComporteProduitRecette", "Fomulaire sur la modification des recettes",false],
	"FormCommande"=>["PHP/VIEW/FORM/", "FormCommande", "Formulaire des commandes",false],
	"FormTaillePizza"=>["PHP/VIEW/FORM/", "FormTaillePizza", "Formulaire des tailles de pizza",false],

	/*****listes****/
	"ListeUsers"=>["PHP/VIEW/LISTE/", "ListeUsers", "Liste des utilisateurs",false],
	"ListeRoles"=>["PHP/VIEW/LISTE/", "ListeRoles", "Liste des rôles",false],
	"ListeTypesProduits"=>["PHP/VIEW/LISTE/", "ListeTypesProduits", "Liste des types de produits",false],
	"ListeAllergenes"=>["PHP/VIEW/LISTE/", "ListeAllergenes", "Liste des allergenes",false],
	"ListeProduits"=>["PHP/VIEW/LISTE/", "ListeProduits", "Liste des produits",false],
	"ListeRecettes"=>["PHP/VIEW/LISTE/", "ListeRecettes", "Liste des recettes",false],
	"ListeTaillesPizzas"=>["PHP/VIEW/LISTE/", "ListeTaillesPizza", "Liste des tailles de pizza",false],
	"ListeCommandes"=>["PHP/VIEW/LISTE/", "ListeCommandes", "Listes des commandes",false],

	/***API****/
	// "MonApi" => ["PHP/MODEL/API/", "MonApi", "API", true],


	"TestFonction"=>["PHP/VIEW/", "TestFonction", "Test de la fonction", false]	
	
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