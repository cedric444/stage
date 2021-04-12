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
	"default"=>["PHP/VIEW/","Accueil","Accueil"],
	"TestallergenesManager"=>["PHP/MODEL/TESTMANAGER/","TestallergenesManager","Test de allergenes"],
	"TestallergenesproduitManager"=>["PHP/MODEL/TESTMANAGER/","TestallergenesproduitManager","Test de allergenesproduit"],
	"TestcommandepizzaManager"=>["PHP/MODEL/TESTMANAGER/","TestcommandepizzaManager","Test de commandepizza"],
	"TestcommandesManager"=>["PHP/MODEL/TESTMANAGER/","TestcommandesManager","Test de commandes"],
	"TestcomporteproduitrecetteManager"=>["PHP/MODEL/TESTMANAGER/","TestcomporteproduitrecetteManager","Test de comporteproduitrecette"],
	"TestcompositionsManager"=>["PHP/MODEL/TESTMANAGER/","TestcompositionsManager","Test de compositions"],
	"TestlignesdecommandesManager"=>["PHP/MODEL/TESTMANAGER/","TestlignesdecommandesManager","Test de lignesdecommandes"],
	"TestpizzasManager"=>["PHP/MODEL/TESTMANAGER/","TestpizzasManager","Test de pizzas"],
	"TestproduitsManager"=>["PHP/MODEL/TESTMANAGER/","TestproduitsManager","Test de produits"],
	"TestproduitsrecettesManager"=>["PHP/MODEL/TESTMANAGER/","TestproduitsrecettesManager","Test de produitsrecettes"],
	"TestrecettesManager"=>["PHP/MODEL/TESTMANAGER/","TestrecettesManager","Test de recettes"],
	"TestrolesManager"=>["PHP/MODEL/TESTMANAGER/","TestrolesManager","Test de roles"],
	"TesttaillespizzasManager"=>["PHP/MODEL/TESTMANAGER/","TesttaillespizzasManager","Test de taillespizzas"],
	"TesttypesproduitsManager"=>["PHP/MODEL/TESTMANAGER/","TesttypesproduitsManager","Test de typesproduits"],
	"TestusersManager"=>["PHP/MODEL/TESTMANAGER/","TestusersManager","Test de users"],
	"ListeUsers"=>["PHP/VIEW/", "ListeUsers", "Liste des utilisateurs"],
	"FormUser"=>["PHP/VIEW/", "FormUser", "formulaire utilisateur"],
	"ActionUser"=>["PHP/VIEW/", "ActionUser", "Action sur les utilisateurs"],
	"ListeRoles"=>["PHP/VIEW/", "ListeRoles", "Liste des rôles"],
	"FormRole"=>["PHP/VIEW/", "FormRole", "Formulaire des rôles"],
	"ActionRole"=>["PHP/VIEW/", "ActionRole", "Action sur les rôles"],
	"ListeRecettes"=>["PHP/VIEW/", "ListeRecettes", "Liste des recettes"],
	"FormRecette"=>["PHP/VIEW/", "FormRecette", "Formulaire des recettes"],
	"ActionRecette"=>["PHP/VIEW/", "ActionRecette", "Action sur les recettes"],
	"ListeTypesproduits"=>["PHP/VIEW/", "ListeTypesproduits", "Liste des types de produits"],
	"FormTypeproduit"=>["PHP/VIEW/", "FormTypeproduit", "Formulaire de types de produits"],
	"ActionTypeproduit"=>["PHP/VIEW/", "ActionTypeproduit", "Action sur les types de produits"],
	"ListeAllergenes"=>["PHP/VIEW/", "ListeAllergenes", "Liste des allergenes"],
	"FormAllergene"=>["PHP/VIEW/", "FormAllergene", "Formulaire des allergenes"],
	"ActionAllergene"=>["PHP/VIEW/", "ActionAllergene", "Action sur les allergenes"],
	"ListeTaillespizzas"=>["PHP/VIEW/", "ListeTaillespizzas", "Liste des tailles de pizza"],
	"FormTaillepizza"=>["PHP/VIEW/", "FormTaillepizza", "Formulaire des tailles de pizza"],
	"ActionTaillepizza"=>["PHP/VIEW/", "ActionTaillepizza", "Action sur les tailles de pizza"],
	"ListeProduits"=>["PHP/VIEW/", "ListeProduits", "Liste des produits"],
	"FormProduit"=>["PHP/VIEW/", "FormProduit", "Formulaire des produits"],
	"ActionProduit"=>["PHP/VIEW/", "ActionProduit", "Action sur les produits"],
	"ListeCommandes"=>["PHP/VIEW/", "ListeCommandes", "Listes des commandes"],
	"FormCommande"=>["PHP/VIEW/", "FormCommande", "Formulaire des commandes"],
	"ActionCommande"=>["PHP/VIEW/", "ActionCommande", "Action sur la commande"],
	"FormComporteProduitRecette"=>["PHP/VIEW/", "FormComporteProduitRecette", "Fomulaire sur la modification des recettes"],

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