<?php
/*fonctions globales*/
function ChargerClasse($classe)
{
    if (file_exists("PHP/CONTROLLER/CLASS/" . $classe . ".Class.php")) {
        require "PHP/CONTROLLER/CLASS/" . $classe . ".Class.php";
    }
    if (file_exists("PHP/MODEL/MANAGER/" . $classe . ".Class.php")) {
        require "PHP/MODEL/MANAGER/" . $classe . ".Class.php";
    }
}
spl_autoload_register("ChargerClasse");

function uri()
{
	$uri = $_SERVER['REQUEST_URI'];
	if (substr($uri, strlen($uri) - 1) == "/") // se termine par /
	{
		$uri .= "index.php?";
	}
	else if (in_array("?", str_split($uri))) // si l'uri contient deja un ?
	{
		$uri .= "&";
	}
	else
	{
		$uri .= "?";
	}
	return $uri;
}

function crypte($mot)
{
	return md5(md5($mot));
}

function texte($codeTexte)
{
	global $lang; //on appel la variable globale
	return TexteManager::findByCodes($lang, $codeTexte);
}

function afficherPage($page)
{
    $chemin = $page[0];
    $nom = $page[1];
    $titre = $page[2];
    if ($page[3]) // C'est une API
    {
        include $chemin . $nom . '.php';
    } else {
        include 'PHP/VIEW/GENERAL/Head.php';
        include 'PHP/VIEW/GENERAL/Header.php';
        include 'PHP/VIEW/GENERAL/Nav.php';
        include $chemin . $nom . '.php';
        include 'PHP/VIEW/GENERAL/Footer.php';
    }
}

/**
 * 
 * @param  $listeId  Liste des id    array
 * @param  $table    Table 			 string
 * @param  $input    Nom de l'input  string
 * @param  @mode     mode url		 string
 * 
 * @return HTML
 * 
 */
function afficherCheckBox($listeId, $table, $input, $mode){
	$nomManager = $table.'Manager';
	$disabled= '';
	$nom= substr($table, 0, -1);
	$nomId= 'getLibelle'.$nom;
	
	if($mode =="ajouter")
	{
		$disabled='disabled';
	}

	foreach($listeId as $id)
	{	
		$obj = $nomManager::findById($id);
		// var_dump($obj);
		$image= $obj->getImage();
		// var_dump($image);
		echo'
		
			
			<div class="check centre">
				<input type="checkbox" '.$disabled.' id="'.$obj->$nomId().'"><label for="'.$obj->$nomId().'"><img src="IMG/'.$image.'"></label>
				<input name="'.$input.'" value="'.$id.'" type="hidden">
			</div>
		
		<div class="mini"></div>';
	}
}

function chargerImage($fileChamp){
    if(is_uploaded_file($_FILES[$fileChamp]['tmp_name']))
    {
        $leNom = uniqid('jpg_') . '.jpg';
    
        move_uploaded_file($_FILES[$fileChamp]['tmp_name'], 'IMG/' .$leNom);
    }
        
    return $leNom;
}
