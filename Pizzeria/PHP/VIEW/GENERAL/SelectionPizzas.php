<section>
<div class="info colonne">
<?php

$idProduit=$_GET['idProduit'];

//On récupère la liste des produits
$produits = ProduitsManager::getList();
for($i=0; $i<count($produits); $i++)
{
    $produit = $produits[$i];
    $idProduits[] = $produit->getIdProduit();
    $libellesProduits[] = $produit->getLibelleProduit();
}
// var_dump($idProduits);
// var_dump($libellesProduits);
//On récupère la liste des pizzas
$pizzas = PizzasManager::getList();

//On recherche les id des recettes pour l'id contenu dans l'url
foreach($idProduits as $idUnProduit)
{
    if($idUnProduit == $idProduit)
    {
        $recettes = ComporteproduitrecetteManager::getByProduit($idUnProduit);
       
        for($i=0; $i<count($recettes); $i++)
        {
            $uneRecette = $recettes[$i];
            
            $idsUneRecette[]= $uneRecette->getIdRecette();
        }
        // var_dump($idsUneRecette);
    }
}
foreach($idsUneRecette as $idUneRecette)
{
    $pizza = $pizzas[$i];
    $idRecettes[] =$pizza->getIdRecette();

    $idRecette = array_unique($idRecettes);         //On élimine les doublons dans la boucle
    
        
    $recette=RecettesManager::findById($idUneRecette);
    echo'<div class="colonne fade">
            <div class="titre centre"><h2>'.$recette->getLibelleRecette(). '</h2></div>
            <div class="espaceHor"></div>
            <div class="mini"></div>
            <div class="image centre"><a id="precedent" class="fleche avant"><i class="fas fa-angle-left"></i></a>
            <img id="pizza" class="photoPizza" src="IMG/'.$recette->getImagePizza().'" alt="'.$recette->getLibelleRecette().'">
            <input type="hidden" class="idPizza" value="'.$recette->getIdRecette().'">
            <a id="suivant" class="fleche apres"><i class="fas fa-angle-right"></i><div class="mini"></div>
        </div>';
    echo'<div class="espaceHor"></div>';
    $produitRecettes= ComporteproduitrecetteManager::getList();
            
    foreach($produitRecettes as $elt)
        {
            // var_dump($produitRecettes);
            if($elt->getIdRecette()==$idUneRecette)
            {
                $idIngredient = $elt->getIdProduit();
                $ingredient = ProduitsManager::findById($idIngredient);
                // var_dump($ingredient);
                echo'<div class="info">'.$ingredient->getLibelleProduit().'</div>';
            }
            
        }           
        
    }

?>
<div class="espaceHor"></div>
<div><a href="index.php?page=Menu"><button class="bouton"><i class="far fa-arrow-alt-circle-left"></i> &nbsp Retour</button></a></div>
</div>