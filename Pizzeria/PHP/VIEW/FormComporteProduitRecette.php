<section>

<?php

// $mode = $_GET['mode'];
$recette = RecettesManager::findById($_GET["idRecette"]);

$liste= ComporteproduitrecetteManager::getByRecette($_GET['idRecette']);
// var_dump($liste);
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



    echo '<div class="info colonne>
    <div class="titre centre"><h2>'.$recette->getLibelleRecette(). '</h2></div></div>';

    foreach($liste as $elt)
    {
        $idProduit= $elt->getIdProduit();
        // var_dump($idProduit);
        $produit = ProduitsManager::findById($idProduit);
        // var_dump($produit);
        $idTypeProduit = $produit->getIdTypeProduit();
        
        $typeProduit = TypesproduitsManager::findById($idTypeProduit);
        
    

    // echo '<div class="espaceHor"></div>';
        
    //         if($idTypeProduit==2)
    //         { 
    //             echo'<div class="double"><h3>' . $typeProduit->getLibelleTypeProduit().'</h3></div>
    //             <div class="espaceHor"></div>';
    //                     if($idProduit==$elt->getIdProduit())
    //                     {
    //                     echo'<div class="info colonne">
    //                     <div class="triple"></div>
    //                     <div class="base">
    //                         <div class="triple"></div>
    //                         <div class="check centre">
    //                             <input type="checkbox" id="base1" class="choix" checked>
    //                             <label for="base1"><img src="IMG/tomato-icon.png" alt="sauce tomate"></label>
    //                         </div>
    //                     <div class="mini"></div>
    //                         <div class="check centre">
    //                             <input type="checkbox" id="base2" class="choix">
    //                             <label for="base2"><img src="IMG/creme-fraiche.png" alt="crême fraîche"></label>
    //                         </div>
    //                         <div class="triple"></div>';
    //                     }
    //         }
    //         echo'<div class="espaceHor"></div>';
    //         if($idTypeProduit==1)
    //         {
    //             echo'<div class="double"><h3>' . $typeProduit->getLibelleTypeProduit().'</h3></div>
    //             <div class="espaceHor"></div>';
    //             if($idProduit==$elt->getIdProduit())
    //             {
    //                 echo'<div class="info colonne">
    //                     <div class="triple"></div>
    //                     <div class="base">
    //                         <div class="triple"></div>
    //                         <div class="check centre">
    //                             <input type="checkbox" id="base2" class="choix" checked>
    //                             <label for="base2"><img src="IMG/champignon.jpg" alt="champignon"></label>
    //                         </div>
    //                         <div class="mini"></div>
    //                          <div class="check centre">
    //                             <input type="checkbox" id="base1" class="choix">
    //                             <label for="base2"><img src="IMG/tomato-icon.png" alt="sauce tomate"></label>';
    //             }
    //         }
    //         echo'<div class="espaceHor"></div>';
    //         if($idTypeProduit==3)
    //         {
    //             echo'<div class="double"><h3>' . $typeProduit->getLibelleTypeProduit().'</h3></div>
    //             <div class="espaceHor"></div>';
    //             if($idProduit==$elt->getIdProduit())
    //             {
    //                 echo'<div class="info colonne">
    //                     <div class="triple"></div>
    //                     <div class="base">
    //                         <div class="triple"></div>
    //                         <div class="check centre">
    //                             <input type="checkbox" id="base2" class="choix" checked>
    //                             <label for="base2"><img src="IMG/mozzarella.png" alt="mozzarella"></label>
    //                         </div>
    //                         <div class="mini"></div>
    //                          <div class="check centre">
    //                             <input type="checkbox" id="base1" class="choix">
    //                             <label for="base2"><img src="IMG/tomato-icon.png" alt="sauce tomate"></label>';
    //             }
    //         }
    //         echo'<div class="espaceHor"></div>';
    //         if($idTypeProduit==4)
    //         {
    //             echo'<div class="double"><h3>' . $typeProduit->getLibelleTypeProduit().'</h3></div>
    //             <div class="espaceHor"></div>';
    //             if($idProduit==$elt->getIdProduit())
    //             {
    //                 echo'<div class="info colonne">
    //                     <div class="triple"></div>
    //                     <div class="base">
    //                         <div class="triple"></div>
    //                         <div class="check centre">
    //                             <input type="checkbox" id="base2" class="choix" checked>
    
    //                             <label for="base2"><img src="IMG/jambon.jpg" alt="jambon"></label>
    //                         </div>
    //                         <div class="mini"></div>
    //                          <div class="check centre">
    //                             <input type="checkbox" id="base1" class="choix">
    //                             <label for="base2"><img src="IMG/tomato-icon.png" alt="sauce tomate"></label>';
    //             }
    //         }
    //                     echo'</div>
    //                     <div class="triple"></div>
    //                 </div>
    //             </div>
    //         </div>
    //     </div> 
    // </div>';
        $liste= ProduitsManager::getByTypeProduit($idTypeProduit);
        // foreach($liste as $elt)
        // {
        //     $id = $elt->getIdProduit();
        //     // var_dump($id);
        //     $listeId[] = $id;
        // }
        
            $listeId[] = $elt->getIdProduit();
        var_dump($listeId);
        // echo'<div class="double"><h3>' . $typeProduit->getLibelleTypeProduit().'</h3></div>
        // <div class="espaceHor"></div>';
        //  afficherCheckBox($listeId, 'Produits', 'idProduit', 'modifier');
}
    
?>
