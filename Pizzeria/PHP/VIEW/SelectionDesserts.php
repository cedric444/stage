<section>
<div class="info colonne">
<div class="titre centre"><h3>Desserts</h3></div>
<div class="espaceHor"></div>
<div>
    <div class="double"></div><a href="index.php?page=SelectionPizzas"><button class="bouton">Pizzas</button></a>
    <div class="mini"></div>
    <a href="index.php?page=SelectionBoissons"><button class="bouton">Boissons</button></a><div class="double"></div>
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
    echo'<div class="info">
    <div class="double"></div><div><img src="IMG/'.$dessert->getImage().'" alt="'.$dessert->getLibelleProduit().'"></div>
    
    <div class="triple centre">'.$dessert->getLibelleProduit().'</div>
    <div class="mini"></div>
    <div class="triple centre">'.$dessert->getPrixProduit().'</div><div class="mini"></div>
    <div class="quantite"><label for="quantite"></label><input type="number" id="quantity" name="quantite" min="0"></div>
    <div class="double"></div></div>';
    
}
?>

<div class="espaceHor"></div>
<div><a href="index.php?page=Panier"><button class="bouton"><i class="fas fa-paper-plane"></i> &nbsp Ajouter au panier</button></a>
<div class="mini"></div>
<a href="index.php?page=Menu"><button class="bouton"><i class="far fa-arrow-alt-circle-left"></i> &nbsp Retour</button></a></div>
</div>
