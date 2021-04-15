<section>
<div class="info colonne">
<div class="titre centre">Boissons</div>
<div class="espaceHor"></div>
<div>
    <div class="double"></div><a href="index.php?page=SelectionPizzas"><button class="bouton">Pizzas</button></a>
    <div class="mini"></div>
    <a href="index.php?page=SelectionDesserts"><button class="bouton">Desserts</button></a><div class="double"></div>
</div>
<div class="espaceHor"></div>
<div class="espaceHor"></div>

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
    echo'<div class="info">
    <div class="double"></div><div><img src="IMG/'.$boisson->getImage().'" alt="'.$boisson->getLibelleProduit().'"></div>
    
    <div class="triple centre">'.$boisson->getLibelleProduit().'</div>
    <div class="mini"></div>
    <div class="triple centre">'.$boisson->getPrixProduit().'</div><div class="double"></div></div>';
}

?>

<div class="espaceHor"></div>
<div><a href="index.php?page=Menu"><button class="bouton"><i class="far fa-arrow-alt-circle-left"></i> &nbsp Retour</button></a></div>
</div>