<section>

<?php

// $mode = $_GET['mode'];

$recettes = ProduitsrecettesManager::getByRecette($_GET["idRecette"]);
// var_dump($recettes);
// $formAction = '<form action="index.php?page=ActionProduit&mode='.$mode.'" method="POST">';

// switch ($mode) {
//     case "ajouter":
//         {
//             $idComporteProduitRecetteHidden = '<input value="" type= "hidden">';
//             $disabled = '';
//             $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
//             break;
//         }
//     case "modifier":
//         {
//             $idComporteProduitRecetteHidden = '<input name= "idUser" value="' . $obj->getIdProduit() . '" type= "hidden">';
//             $disabled = '';
//             $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
//             break;
//         }
//     case "details":
//         {
//             $idComporteProduitRecetteHidden = '<input name= "idUser" value="' . $obj->getIdProduit() . '" type= "hidden">';
//             $disabled = 'disabled';
//             $submit = "";
//             break;
//         }
//     case "supprimer":
//         {
//             $idComporteProduitRecetteHidden = '<input name= "idUser" value="' . $obj->getIdProduit() . '" type= "hidden">';
//             $disabled = 'disabled';
//             $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
//             break;
//         }
// }



// $idRecette = $obj->getIdRecette();
// $recette = ProduitsrecettesManager::getByRecette($_GET["id"]);
// var_dump($recette);
// $idProduit = $obj->getIdProduit();
// $produit = ProduitsManager::findById($idProduit);
// $idTypeProduit = $produit->getIdTypeProduit();
// $typeProduit = TypesproduitsManager::findById($idTypeProduit);
// var_dump($typeProduit);

for($i=0;$i<count($recettes); $i++)
{
    $idRecette = $recettes[$i]->getIdRecette();
    $recette = $recettes[$i]->getLibelleRecette();
    

    echo '<div class="info colonne>
    <div class="titre centre"><h2>'.$recette. '</h2></div></div>';}

    echo '<div class="espaceHor"></div> 
    <div class="info colonne triple">
        <div class="info colonne">
            <div class="triple"></div>
            <div class="info colonne">
                <div class="double"></div>
                <div class="espaceHor"></div>
                <div class="info colonne">
                    <div class="triple"></div>
                    <div class="base">
                        <div class="triple"></div>
                        <div class="check centre">
                            <input type="checkbox" id="base1" class="choix">
                            <label for="base1"><img src="IMG/tomato-icon.png" alt="sauce tomate"></label>
                        </div>
                        <div class="mini"></div>
                        <div class="check centre">
                            <input type="checkbox" id="base2" class="choix">
                            <label for="base2"><img src="IMG/creme-fraiche.png" alt="crême fraîche"></label>
                        </div>
                        <div class="triple"></div>
                    </div>
                </div>
            </div>
        </div> 
    </div>';

?>

