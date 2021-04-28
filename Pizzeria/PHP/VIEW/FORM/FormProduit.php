<section>

    <?php

$mode = $_GET['mode'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $unProduit = ProduitsManager::findById($id);
} else {
    $unProduit = new Produits();
}

$formAction = '<form action="index.php?page=ActionProduit&mode='.$mode.'" method="POST" enctype="multipart/form-data">';
$idTypeProduit= $unProduit->getIdTypeProduit();
// var_dump($idTypeProduit);
$liste = TypesproduitsManager::getList();


switch ($mode) {
    case "ajouter":
        {
            $idProduitHidden = '<input value="" type= "hidden">';
            $disabled = '';
            $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
            break;
        }
    case "modifier":
        {
            $idProduitHidden = '<input name= "idProduit" value="' . $unProduit->getIdProduit() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            
            break;
        }
    case "details":
        {
            $idProduitHidden = '<input name= "idProduit" value="' . $unProduit->getIdProduit() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            break;
        }
    // case "supprimer":
    //     {
    //         $idProduitHidden = '<input name= "idProduit" value="' . $unProduit->getIdProduit() . '" type= "hidden">';
    //         $disabled = 'disabled';
    //         $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
    //         break;
    //     }
}

echo $formAction;
echo $idProduitHidden;

?>
            <div>
                <div class="triple"></div>
                <div class="info colonne ">
                    <label for="libelleProduit">Libelle</label>
                    <input type="text" id="libelle" <?=$disabled;?> name="libelleProduit" value="<?=$unProduit->getLibelleProduit();?>" required pattern="[a-zA-Z- ]{3,}"/>
                </div>
                <div class="triple"></div>
            </div>
            <div class="espaceHor"></div>
            <div>
                <div class="triple"></div>
                <div class="info colonne ">
                    <label for="prixProduit">Prix</label><input type="text" id="prixProduit" <?=$disabled;?> name="prixProduit" value="<?=$unProduit->getPrixProduit();?>" pattern="^\d+(.\d{1,2})?$"/>
                    <!-- pattern="^[0-9]{1,2}[.,]{1}[0-9]{1,2}$" -->                   
                </div>
                <div class="triple"></div>
            </div>
            <div class="espaceHor"></div>
            <div>
                <div class="triple"></div>
                <div class="info colonne">
                    <label for="quantite">Quantite</label>
                    <input type="text" id="quantite" <?=$disabled;?> name="quantite" pattern="[0-9]{0,}"
                    value="<?php echo $unProduit->getQuantite();?>"/>
                </div>
                <div class="triple"></div>
            </div>
            <div class="espaceHor"></div>
            <div>
                <div class="triple"></div>
                <div class="info colonne">
                    <label for="idTypeProduit">Type produit</label>
                    <select name="idTypeProduit">
                        <?php
                        $sel="";
                        foreach($liste as $elt)
                        {
                            
                            if($elt->getIdTypeProduit()=== $idTypeProduit)    
                            {
                                $sel="selected";
                            }   
                            else
                            {
                                $sel="";
                            }                       
                            echo'<option ' .$sel.' id="idTypeProduit" name="idTypeProduit" value="'. $elt->getIdTypeProduit().'">'. $elt->getLibelleTypeProduit().'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="triple"></div>                       
            </div>
            <div class="espaceHor"></div>
            <div>
                <div class="triple"></div>
                <div class="info colonne">
                    <label for="image">Image</label>
                    <?php
                    if($mode=="ajouter")
                    {
                        echo'<input type="file" id="image" '.$disabled.' name="image" required>';
                    }
                    else
                    {
                        
                        echo'<input type="text" name="image" hidden value="'.$unProduit->getImage().'">';
                        echo'<img id="image" alt="image du produit" src="IMG/'.$unProduit->getImage().'">';
                        if($mode=="modifier")
                        {
                        echo'<button type="button" class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier l\'image</button>';
                        }
                    }
                ?>  
                </div>
                <div class="triple"></div>                       
            </div>
            <div class="info">
            <?php
            
            echo $submit;
            echo '<a href="index.php?page=ListeProduits"><button type="button" class="bouton"><i class="far fa-arrow-alt-circle-left"></i>&nbsp Retour</button></a>';
            
            ?>
            </div>
            <div>
                <div class="info">
                    <div class="erreur"></div>
                </div>
            </div>
            
            </div>