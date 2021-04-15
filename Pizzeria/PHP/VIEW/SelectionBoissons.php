<section>
<div class="info colonne">
<div class="titre centre">Boissons</div>

<div class="double"></div><div class="grande"><a href="index.php?page=SelectionPizza"><button class="bouton">Pizzas</button></a></div><div class="double"></div>
<div class="mini"></div>
<div class="double"></div><div class="grande"><a href="index.php?page=SelectionDesserts"><button class="bouton">Desserts</button></a></div><div class="double"></div>

<?php
$listetypesProduits=TypesproduitsManager::getList();
foreach($listetypesProduits as $typeProduit) 
{
    $type = $typeProduit->getLibelleTypeProduit();
    // var_dump($type);
    

    if($type=="boisson")
    {
        $idTypeProduit = $typeProduit->getIdTypeProduit();
        // var_dump($idTypeProduit);
    }
}
$listeBoissons = ProduitsManager::getByTypeProduit($idTypeProduit);
// var_dump($listeBoissons);

foreach($listeBoissons as $boisson)
{
    echo'<div class="double"><img src="IMG/'.$boisson->getImage().'" alt="'.$boisson->getLibelleProduit().'"></div>
    <div class="mini"></mini>
    <div class="double">'.$boisson->getLibelleProduit().'</div>
    <div class="mini"></div>
    <div class="double">'.$boisson->getPrixProduit().'</div>';
}

