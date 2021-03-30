<section>

    <?php

$mode = $_GET['mode'];
$type = $_GET['type'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $unUser = UsersManager::findById($id);
} else {
    $unUser = new Users();
}
$formAction = '<form action="index.php?page=ActionUser&mode='.$mode.'&type='.$type.'" method="POST">';

switch ($mode) {
    case "ajouter":
        {
            $idUserHidden = '<input value="" type= "hidden">';
            $disabled = '';
            $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
            break;
        }
    case "modifier":
        {
            $idUserHidden = '<input name= "idUser" value="' . $unUser->getIdUser() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            break;
        }
    case "details":
        {
            $idUserHidden = '<input name= "idUser" value="' . $unUser->getIdUser() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            break;
        }
    case "supprimer":
        {
            $idUserHidden = '<input name= "idUser" value="' . $unUser->getIdUser() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
            break;
        }
}

echo $formAction;
echo $idUserHidden;

?>
            <div>
                <div class="info colonne ">
                    <label for="nomUser">Nom :</label>
                    <input type="text" id="nomUser" <?=$disabled;?> name="nomUser" value="<?=$unUser->getNomUser();?>" required pattern="[a-zA-Z- ]{3,}">
                </div>
                <div class="info colonne ">
                    <label for="prenomUser">Prénom :</label>
                    <input type="text" id="prenomUser" <?=$disabled;?> name="prenomUser" value="<?=$unUser->getPrenomUser();?>" required pattern="[a-zA-Z- ]{3,}">
                </div>
            </div>
            <div>

                <div class="info colonne  grande">
                    <label for="emailUser">Adresse E-mail :</label>
                    <input type="text" id="emailUser" <?=$disabled;?> name="emailUser" required
                        pattern="^[0-9a-zA-Z._-]+@{1}[0-9a-zA-Z.-]{2,}[.]{1}[a-z]{2,6}$" value="<?=$unUser->getMailUser();?>">
                </div>
                <div class="info colonne  grande">
                    <label for="telUser">Numéro de téléphone :</label>
                    <input type="text" id="telephone" <?=$disabled;?> name="telUser" required
                        pattern="^[0-9]{10}$" value="<?php echo $unUser->getTelUser(); ?>">
                </div>
            </div>
            <div>
                <div class="info colonne grande">
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse"<?=$disabled;?> name="adresse" required
                    value="<?php echo $unUser->getAdresse();?>">
                 </div>
            </div>
            <div>
                <div class="info colonne grande">
                    <label for="codePostal">Code Postal:</label>
                    <input type="text" id="codePostal"<?=$disabled;?> name="codePostal" required
                    value ="<?php echo $unUser->getCodePostal();?>">
                </div>
                <div>
                    <label for="ville">Ville:</label>
                    <input type="text" id="ville"<?=$disabled;?> name="ville" required
                    value="<?php echo$user->getVille();?>">
                </div>  
            </div>