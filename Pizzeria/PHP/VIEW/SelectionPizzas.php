<section>
<?php




$pizzas = PizzasManager::getList();
// var_dump($pizzas);
foreach($pizzas as $unePizza)
{
    $idRecette = $unePizza->getIdRecette();
    $recette = RecettesManager::findById($idRecette);
    echo'<div class="info colonne>
        <div class="titre centre"><h2>'.$recette->getLibelleRecette(). '</h2></div></div>
        <div class="espaceHor">
        <div class="image centre">
        <img src="IMG/'.$recette->getImagePizza().'" alt="'.$recette->getLibelleRecette().'">';
}