<section>

    <?php

$mode = $_GET['mode'];
$role = $_SESSION['user']->getIdRole();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $uneRecette = RecettesManager::findById($id);
} else {
    $uneRecette = new Recettes();
}
$formAction = '<form action="index.php?page=ActionRecette&mode='.$mode.'" method="POST">';

switch ($mode) {
    case "ajouter":
        {
            $idRecetteHidden = '<input value="" type= "hidden">';
            $disabled = '';
            $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
            break;
        }
    case "modifier":
        {
            $idRecetteHidden = '<input name= "idUser" value="' . $uneRecette->getIdRecette() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            break;
        }
    case "details":
        {
            $idRecetteHidden = '<input name= "idUser" value="' . $uneRecette->getIdRecette() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            break;
        }
    case "supprimer":
        {
            $idRecetteHidden = '<input name= "idUser" value="' . $uneRecette->getIdRecette() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
            break;
        }
}

echo $formAction;
echo $idRecetteHidden;

?>
            <div>
                <div class="info colonne ">
                    <label for="libelleRecette">Libelle</label>
                    <input type="text" id="libelle" <?=$disabled;?> name="libelleRecette" value="<?=$uneRecette->getLibelleRecette();?>" required pattern="[a-zA-Z- ]{3,}">
                </div>
                <?php
                echo'<div class="info colonne ">
                    <label for="imagePizza">Photo</label>
                    <input type="text" name="imagePizza" hidden value="'.$uneRecette->getImagePizza().'">';
                echo'<img id="imagePizza" alt="image de la pizza" src="IMG/'.$uneRecette->getImagePizza().'">';?>
                    <input type="hidden" name="MAX_FILE_SIZE" value="250000"/>
                    <input type="file" id="imagePizza"  name="imagePizza" size=50 <?=$disabled?>
                    value="/IMG/'<?php if($mode!="ajouter") echo $uneRecette->getImagePizza();?>"/>
                </div>
                <div class="info colonne  grande">
                    <label for="prixRecette">prix</label>
                    <input type="text" id="prixRecette" <?=$disabled;?> name="prixRecette" required
                    pattern="^[0-9]{1,2}[.,]{1}[0-9]{1,2}$" value="<?php echo $uneRecette->getPrixRecette(); ?>">
                </div>
                <div class="info colonne grande">
                    <label for="dateDebut">date de début</label>
                    <input type="date" id="dateDebut" <?=$disabled;?> name="dateDebut"
                    value="<?php echo $uneRecette->getDateDebut();?>">
                </div>
                <div class="info colonne grande">
                    <label for="dateFin">Date de fin</label>
                    <input type="date" id="dateFin" <?=$disabled;?> name="dateFin"
                    value ="<?php echo $uneRecette->getDateFin();?>">
                </div>
                        
            </div>
            <div class="espaceHor"></div>
            <div class="info">
            <?php
            
            echo $submit;
            echo '<a href="index.php?page=ListeRecettes"><div class="bouton"><i class="far fa-arrow-alt-circle-left"></i>&nbsp Retour</div></a>';
            
            ?>
            </div>
            <div>
                <div class="info">
                    <div class="erreur"></div>
                </div>
            </div>
            
            </div>