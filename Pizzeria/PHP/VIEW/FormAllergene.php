<div></div>
<section>

<?php

$mode = $_GET['mode'];
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $unAllergene= AllergenesManager::findById($id);
}
else
{
    $unAllergene = new Allergenes();
}

switch($mode){
    case "ajouter":
        {
            $formAllergene = '<form action="index.php?page=ActionAllergene$mode=ajouter" method=POST">';
            $idAllergeneHidden = '<input value="" type="hidden">';
            $disabled = '';
            $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
            break; 
        }
    case "modifier":
        {
            $formAllergene = '<form action="index.php?page=ActionRole$mode=modifier" method=POST">';
            $idAllergeneHidden = '<input name= "idRole" value="' . $unRole->getIdRole() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            break;
        }
    case "details":
        {
            $formAllergene = '<form method="POST" >';
            $idAllergeneHidden = '<input name= "idRole" value="' . $unRole->getIdRole() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            break;
        }
    case "supprimer":
        {
            $formAllergene = '<form action="index.php?page=ActionRoles&mode=supprimer" method="POST">';
            $idAllergeneHidden = '<input name= "idRole" value="' . $unRole->getIdRole() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
            break;
        }        
}

echo $formAllergene;
echo $idAllergeneHidden;
?>

<div>
    <div class="info colonne">
        <label for="libelleAllergene">Libelle</label>
        <input type="text" id="libelleAllergene" <?=$disabled;?> name="libelleAllergene" value="<?=$unAllergene->getLibelleAllergene();?>" pattern="^[a-zA-Z ]{1,}" required >
    </div> 
</div>
<div>
    <div class="info">
        <?php
echo $submit;
echo '<a href="index.php?page=ListeAllergenes"><div class="bouton"><i class"far fa-arrow-alt-circle-left"></i>&nbsp Retour</div></a>';
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