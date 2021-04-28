<div></div>
<section>

<?php

$mode = $_GET['mode'];
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $unRole= RolesManager::findById($id);
}
else
{
    $unRole = new Roles();
}

switch($mode){
    case "ajouter":
        {
            $formRole = '<form action="index.php?page=ActionRole&mode=ajouter" method="POST">';
            $idRoleHidden = '<input value="" type="hidden">';
            $disabled = '';
            $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
            break; 
        }
    case "modifier":
        {
            $formRole = '<form action="index.php?page=ActionRole&mode=modifier" method="POST">';
            $idRoleHidden = '<input name= "idRole" value="' . $unRole->getIdRole() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            break;
        }
    case "details":
        {
            $formRole = '<form method="POST" >';
            $idRoleHidden = '<input name= "idRole" value="' . $unRole->getIdRole() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            break;
        }
    case "supprimer":
        {
            $formRole = '<form action="index.php?page=ActionRole&mode=supprimer" method="POST">';
            $idRoleHidden = '<input name= "idRole" value="' . $unRole->getIdRole() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
            break;
        }        
}

echo $formRole;
echo $idRoleHidden;
?>

<div>
    <div class="info colonne">
        <label for="libelleRole">Libelle rôle</label>
        <input type="text" id="libelleRole" <?=$disabled;?> name="libelleRole" value="<?=$unRole->getLibelleRole();?>" required >
    </div> 
</div>
<div>
    <div class="info">
        <?php
echo $submit;
echo '<a href="index.php?page=ListeRoles"><div class="bouton"><i class"far fa-arrow-alt-circle-left"></i>&nbsp Retour</div></a>';
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