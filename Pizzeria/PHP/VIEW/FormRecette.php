<section>
<div class="double"></div>
    <?php

$mode = $_GET['mode'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $uneRecette = RecettesManager::findById($id);
} else {
    $uneRecette = new Recettes();
}
$formAction = '<form class="double" action="index.php?page=ActionRecette&mode='.$mode.'" method="POST" enctype="multipart/form-data">';

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
            <div class="info colonne">
                
                    
                        <label for="libelleRecette">Libelle</label>
                        <input type="text" id="libelle" <?=$disabled;?> name="libelleRecette" value="<?=$uneRecette->getLibelleRecette();?>" required pattern="[a-zA-Z- ]{3,}">
                    
                        <div class="espaceHor"></div>
                <?php
                echo'
                    <label for="imagePizza">Photo</label>';
                    if($mode=="ajouter")
                    {
                        echo'<input type="file" id="imagePizza" '.$disabled.' name="imagePizza" required>';
                    }
                    else {

                        echo'<input type="text" name="imagePizza" hidden value="'.$uneRecette->getImagePizza().'">';
                        echo'<img id="image" alt="image de la pizza" src="IMG/'.$uneRecette->getImagePizza().'">';
                        if($mode=="modifier")
                        {
                            echo'<button type="button" class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier l\'image</button>';
                        }
                    }
                    ?>

                
                    
                        <label for="prixRecette">prix</label>
                        <input type="text" id="prixRecette" <?=$disabled;?> name="prixRecette" required
                        pattern="^[0-9]{1,2}[.,]{0,1}[0-9]{0,2}$" value="<?php echo $uneRecette->getPrixRecette(); ?>">
                    
                        <div class="espaceHor"></div>

                        <label for="dateDebut">date de début</label>
                        <input type="date" id="dateDebut" <?=$disabled;?> name="dateDebut"
                        value="<?php echo $uneRecette->getDateDebut();?>">
                    
                        <div class="espaceHor"></div>

                        <label for="dateFin">Date de fin</label>
                        <input type="date" id="dateFin" <?=$disabled;?> name="dateFin"
                        value ="<?php echo $uneRecette->getDateFin();?>">
                    
                        
                            
            </div>
            
            <div class="espaceHor"></div>
            <div class="info">
            <?php
            
            echo $submit;
            echo '<a href="index.php?page=ListeRecettes"><button type="button" class="bouton"><i class="far fa-arrow-alt-circle-left"></i>&nbsp Retour</button></a>';
            
            ?>
            
            </div>
            <div>
                <div class="info">
                    <div class="erreur"></div>
                </div>
            </div>
            </form>
            <div class="double"></div> 