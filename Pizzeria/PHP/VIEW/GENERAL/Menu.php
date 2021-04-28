<section>
<?php

$type= TypesproduitsManager::getByLibelle("base");
$idType = $type->getIdTypeProduit();
$liste= ProduitsManager::getList();

echo'<div class="info colonne">

<div class="titre centre"><h1>Menu</h1></div>
<div class="espaceHor"></div>


    <div class="double"></div><div class="grande" id="pizzas"><button type="button" class="bouton">Pizzas</button></div><div id="apres" class="double"></div>
    <div class="espaceHor"></div>';
    
    echo'
        
        <div class="centre">';
            foreach($liste as $produit)
            {
                if($produit->getIdTypeProduit()== $idType)
                {
                    // $imageBases[] = $produit->getImage(); 
                    // $idProduits[] = $produit->getIdProduit();
                    $produits = ProduitsManager::getByTypeProduit($produit->getIdTypeProduit());
                }
            }
            // var_dump($imageBases);
            // var_dump($produits);
            foreach($produits as $unProduit)
            {
                
                // foreach($idProduits as $idProduit)
                
                    echo'<div class="triple"></div><div class="grande" id="idProduit"><img class="masque images" id="'.$unProduit->getIdProduit().'" src="IMG/'.$unProduit->getImage().'"></div>';
                    // echo'<input type="hidden" class="idProduit" value="'.$unProduit->getIdProduit().'"></div>';
                
            }
            
    echo'<div class="triple"></div></div>
    
    
    <div class="espaceHor"></div>

    <div class="double"></div><div class="grande"><a href="index.php?page=SelectionBoissons"><button class="bouton">Boissons</button></a></div><div class="double"></div>
    <div class="espaceHor"></div>
    <div class="double"></div><div class="grande"><a href="index.php?page=SelectionDesserts"><button class="bouton">Desserts</button></a></div><div class="double"></div>
</div>';

