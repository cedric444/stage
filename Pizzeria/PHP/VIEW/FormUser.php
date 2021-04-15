<section>

    <?php
$currentUser = new Users ($_SESSION);
// var_dump($currentUser);
$mode = $_GET['mode'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $unUser = UsersManager::findById($id);
} else {
    $unUser = new Users();
}
$formAction = '<form action="index.php?page=ActionUser&mode='.$mode.'" method="POST">';

switch ($mode) {
    case "ajouter":
        {
            $idUserHidden = '<input value="" type= "hidden">';
            $disabled = '';
            $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
            $hidden = '';
            break;
        }
    case "modifier":
        {
            $idUserHidden = '<input name= "idUser" value="' . $unUser->getIdUser() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            $hidden = '';
            break;
        }
    case "details":
        {
            $idUserHidden = '<input name= "idUser" value="' . $unUser->getIdUser() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            $hidden = 'hidden';
            break;
        }
    case "supprimer":
        {
            $idUserHidden = '<input name= "idUser" value="' . $unUser->getIdUser() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
            $hidden ='';
            break;
        }
}

echo $formAction;
echo $idUserHidden;

?>
            <div>
                <fieldset>
                    <legend>Informations de contact</legend>
                        <div class="info colonne ">
                            <label for="nomUser">Nom:</label>
                            <input type="text" id="nomUser" <?=$disabled;?> name="nomUser" value="<?=$unUser->getNomUser();?>" required pattern="[a-zA-Z- ]{3,}">
                        </div>
                        <div class="info colonne ">
                            <label for="prenomUser">Prénom:</label>
                            <input type="text" id="prenomUser" <?=$disabled;?> name="prenomUser" value="<?=$unUser->getPrenomUser();?>" required pattern="[a-zA-Z- ]{3,}">
                        </div>
                        <div class="info colonne  grande">
                            <label for="telUser">Numéro de téléphone:</label>
                            <input type="text" id="telUser" <?=$disabled;?> name="telUser" required
                            pattern="^[0-9]{10}$" value="<?php echo $unUser->getTelUser(); ?>">
                        </div>
                        <div class="info colonne grande">
                            <label for="adresse">Adresse:</label>
                            <input type="text" id="adresse" <?=$disabled;?> name="adresse" required
                            value="<?php echo $unUser->getAdresse();?>">
                        </div>
                        <div class="info colonne grande">
                            <label for="codePostal">Code Postal:</label>
                            <input type="text" id="codePostal" <?=$disabled;?> name="codePostal" required
                            pattern="^[0-9]{5}$" value ="<?php echo $unUser->getCodePostal();?>">
                        </div>
                        <div class="info colonne grande">
                            <label for="ville">Ville:</label>
                            <input type="text" id="ville"<?=$disabled;?> name="ville" required
                            pattern="^[a-zA-Z-]{1,}$" value="<?php echo $unUser->getVille();?>">
                        </div>
                </fieldset>  
            </div>
            <div class="espaceHor"></div>
            <div>
                <fieldset>
                    <legend>Informations de connexion</legend>
                    <div class="info colonne grande">
                        <label for="mailUser">E-mail:</label>
                        <input type="text" id="mailUser" <?=$disabled;?> name="mailUser" required
                        pattern="^[0-9a-zA-Z._-]+@{1}[0-9a-zA-Z.-]{2,}[.]{1}[a-z]{2,6}$" value="<?=$unUser->getMailUser();?>">
                    </div>
                    <div class="info colonne grande">
                        <label for="motDePasse">Mot de passe:</label>
                        <input type="password" id="motDePasse" <?=$disabled;?> name="motDePasse" required <?=$hidden;?> 
                        pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" value="<?=$unUser->getMotDePasse();?>">
                    </div>
                </fieldset>
                    <input type="hidden" name="idRole" value="2"/>
            </div>
            <div class="espaceHor"></div>
            <div class="info">
            <?php
            
            echo $submit;
            echo '<a href="index.php?page=ListeUsers"><div class="bouton"><i class="far fa-arrow-alt-circle-left"></i>&nbsp Retour</div></a>';
            
            ?>
            </div>
            <div>
                <div class="info">
                    <div class="erreur"></div>
                </div>
            </div>
            
            </div>