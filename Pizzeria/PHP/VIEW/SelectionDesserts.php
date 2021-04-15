<section>
<div class="info colonne">
<div class="titre centre"><h3>Desserts</h3></div>
<div class="espaceHor"></div>
<div>
    <div class="double"></div><div><a href="index.php?page=SelectionPizza"><button class="bouton">Pizzas</button></a></div>
    <div class="mini"></div>
    <div><a href="index.php?page=SelectionBoissons"><button class="bouton">Boissons</button></a></div><div class="double"></div>
</div>
<div class="espaceHor"></div>
<div class="espaceHor"></div>

<?php
$listetypesProduits=TypesproduitsManager::getList();
foreach($listetypesProduits as $typeProduit) 
{
    $type = $typeProduit->getLibelleTypeProduit();
    // var_dump($type);
    

    if($type=="dessert")
    {
        $idTypeProduit = $typeProduit->getIdTypeProduit();
        // var_dump($idTypeProduit);
    }
}
$listeDesserts = ProduitsManager::getByTypeProduit($idTypeProduit);
// var_dump($listeBoissons);

foreach($listeDesserts as $dessert)
{
    echo'<div class="double"><img src="IMG/'.$dessert->getImage().'" alt="'.$dessert->getLibelleProduit().'"></div>
    <div class="mini"></mini>
    <div class="double">'.$dessert->getLibelleProduit().'</div>
    <div class="mini"></div>
    <div class="double">'.$dessert->getPrixProduit().'</div>';
}
?>

<div class="espaceHor"></div>
<div><a href="index.php?page=Menu"><button class="bouton"><i class="far fa-arrow-alt-circle-left"></i> &nbsp Retour</button></a></div>
