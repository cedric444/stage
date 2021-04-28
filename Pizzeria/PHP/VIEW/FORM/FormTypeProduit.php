<div></div>
<section>

<?php

$mode = $_GET['mode'];
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $unProduit= TypesproduitsManager::findById($id);
}
else
{
    $unProduit = new Typesproduits();
}
$formAction= '<form action="index.php?page=ActionTypeProduit&mode='.$mode.'" method="POST">';


switch($mode){
    case "ajouter":
        {
            $idTypeProduitHidden = '<input value="" type="hidden">';
            $disabled = '';
            $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
            break; 
        }
    case "modifier":
        {
            $idTypeProduitHidden = '<input name= "idTypeProduit" value="' . $unProduit->getIdTypeProduit() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            break;
        }
    case "details":
        {
            
            $idTypeProduitHidden = '<input name= "idTypeProduit" value="' . $unProduit->getIdTypeProduit() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            break;
        }
    case "supprimer":
        {
            $idTypeProduitHidden = '<input name= "idTypeProduit" value="' . $unProduit->getIdTypeProduit() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
            break;
        }        
}

echo $formAction;
echo $idTypeProduitHidden;
?>

<div>
    <div class="info colonne">
        <label for="libelleTypeProduit">Libelle</label>
        <input type="text" id="libelleTypeProduit" <?=$disabled;?> name="libelleTypeProduit" value="<?=$unProduit->getLibelleTypeProduit();?>"
        pattern="[a-zA-Z- ]{3,}" required >
    </div> 
</div>
<div>
    <div class="info">
        <?php
echo $submit;
echo '<a href="index.php?page=ListeTypesProduits"><button type="button" class="bouton"><i class"far fa-arrow-alt-circle-left"></i>&nbsp Retour</button></a>';
?>
    </div>
</div>
<div>
    <div class="info">
        <div class="erreur"></div>
    </div>
</div>
</form>
</section>
<div></div>