<section>

    <?php

$mode = $_GET['mode'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $unProduit = ProduitsManager::findById($id);
} else {
    $unProduit = new Produits();
}

$formAction = '<form action="index.php?page=ActionProduit&mode='.$mode.'" method="POST">';
$idTypeProduit= $unProduit->getIdTypeProduit();
$typeProduit = TypesproduitsManager::findById($idTypeProduit);


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
                    <label for="prixProduit">Prix</label>
                    <input type="text" id="prixProduit" <?=$disabled;?> name="prixProduit" value="<?=$unProduit->getPrixProduit();?>" pattern="^[0-9]{1,2}[.,]{1}[0-9]{1,2}$"/>
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
                    <label for="typeProduit">Type produit</label>
                    <input type="text" id="typeProduit"<?=$disabled;?> name="typeProduit" pattern="^[a-zA-Z ]{3,}"
                    value="<?php if($mode!="ajouter") echo $typeProduit->getLibelleTypeProduit();?>"/>
                    <label for="idTypeProduit"></label>
                    <input type="hidden" id="idTypeProduit" name="idTypeProduit" value="<?php echo $unProduit->getIdTypeProduit()?>"/>
                </div>
                <div class="triple"></div>                       
            </div>
            <div class="espaceHor"></div>
            <div>
                <div class="triple"></div>
                <div class="info colonne">
                    <label for="image">Image</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="250000"/>
                    <input type="file" id="image"<?=$disabled;?> name="image" size=50 pattern="^[a-zA-Z.]{3,}"
                    value="/IMG/<?php if($mode!="ajouter") echo $unProduit->getImage();?>"/>
                </div>
                <div class="triple"></div>                       
            </div>
            <div class="info">
            <?php
            
            echo $submit;
            echo '<a href="index.php?page=ListeProduits"><div class="bouton"><i class="far fa-arrow-alt-circle-left"></i>&nbsp Retour</div></a>';
            
            ?>
            </div>
            <div>
                <div class="info">
                    <div class="erreur"></div>
                </div>
            </div>
            
            </div>