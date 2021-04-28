<section>

<?php

$mode = $_GET['mode'];
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

    echo '<div class="info colonne">
    <div class="titre centre"><h2>'.$recette->getLibelleRecette(). '</h2></div></div>';


    //On récupère la liste des produits
    $listeProduits = ProduitsManager::getList();
    // var_dump($listeProduits);

    //Puis les id
    foreach($listeProduits as $produit)
    {
        $listeId[] =$produit->getIdProduit();
        // var_dump($listeProduits);
        $produitIdTypes[] = $produit->getIdTypeProduit();
    }
    

    // On récupère les id des types de produits pour les afficher
    foreach($liste as $elt)
    {
        $idProduit= $elt->getIdProduit();
        // var_dump($idProduit);
        $produit = ProduitsManager::findById($idProduit);
        // var_dump($produit);
        $idTypeProduit = $produit->getIdTypeProduit();
        
        $typeProduit = TypesproduitsManager::findById($idTypeProduit);
        
        
    }
    $listeTypes = TypesproduitsManager::getList();
    foreach($listeTypes as $type)
    {
        $idT = $type->getIdTypeProduit();
        $libelleType = $type->getLibelleTypeProduit();
        if($libelleType!="boisson" && $libelleType!="dessert")
        {
            echo'<div class"double" id="libelleProduit"><h3>'.$libelleType.'</h3></div>
            <div>';
        }

        $produitIdTypes =array_unique($produitIdTypes);

        foreach($produitIdTypes as $idType)
        {
            
            
            if($idType==$idTypeProduit)
            {
                
                echo'<div class="triple"></div>';
                afficherCheckBox($listeId,"Produits","idProduit",$mode);
                echo'<div class="triple"></div>';
            }
            
            echo'</div>';
        }
    }

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
    
    
?>
