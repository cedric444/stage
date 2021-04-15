<section>
<div class="info colonne">
<?php




$pizzas = PizzasManager::getList();


for($i=0;$i<count($pizzas);$i++)
{
    $pizza = $pizzas[$i];
    $idRecettes[] =$pizza->getIdRecette();
}
// var_dump($idRecettes);
$idRecette = array_unique($idRecettes);
// var_dump($idRecette);
foreach($idRecette as $uneIdRecette)
{
    $recette=RecettesManager::findById($uneIdRecette);
    echo'<div class="colonne"><div class="titre centre"><h2>'.$recette->getLibelleRecette(). '</h2></div>
         <div class="espaceHor"></div>
         <div class="image centre">
         <img src="IMG/'.$recette->getImagePizza().'" alt="'.$recette->getLibelleRecette().'"></div></div>';

}
?>
</div>