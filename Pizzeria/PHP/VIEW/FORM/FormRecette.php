<section>

    <?php

$mode = $_GET['mode'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $uneRecette = RecettesManager::findById($id);
} else {
    $uneRecette = new Recettes();
}

$formAction = '<form action="index.php?page=ActionRecette&mode='.$mode.'" method="POST" enctype="multipart/form-data">';

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
            $idRecetteHidden = '<input name= "idRecette" value="' . $uneRecette->getIdRecette() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            
            break;
        }
    case "details":
        {
            $idRecetteHidden = '<input name= "idRecette" value="' . $uneRecette->getIdRecette() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            break;
        }
        case "supprimer":
            {
                $idRecetteHidden = '<input name= "idRecette" value="' . $uneRecette->getIdRecette() . '" type= "hidden">';
                $disabled = 'disabled';
                $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
                break;
            }
}

echo $formAction;
echo $idRecetteHidden;

?>
            <div>
                <div class="triple"></div>
                <div class="info colonne ">
                    <label for="libelleRecette">Libelle</label>
                    <input type="text" id="libelleRecette" <?=$disabled;?> name="libelleRecette" value="<?=$uneRecette->getLibelleRecette();?>" required pattern="[a-zA-Z- ]{3,}"/>
                </div>
                <div class="triple"></div>
            </div>
            <div class="espaceHor"></div>
            <div>
                <div class="triple"></div>
                <div class="info colonne ">
                    <label for="prixRecette">Prix</label><input type="text" id="prixRecette" <?=$disabled;?> name="prixRecette" value="<?=$uneRecette->getPrixRecette();?>" pattern="^\d+(.\d{1,2})?$"/>                  
                </div>
                <div class="triple"></div>
            </div>
            <div class="espaceHor"></div>
            <div>
                <div class="triple"></div>
                <div class="info colonne">
                    <label for="dateDebut">Date de début</label>
                    <input type="date" id="dateDebut" <?=$disabled;?> name="dateDebut" 
                    value="<?php echo $uneRecette->getDateDebut();?>"/>
                </div>
                <div class="triple"></div>
                <div class="info colonne">
                    <label for="dateFin">Date de fin</label>
                    <input type="date" id="dateFin" <?=$disabled;?> name="dateFin" 
                    value="<?php echo $uneRecette->getDateFin();?>"/>
                </div>
            </div>
            <div class="espaceHor"></div>
            <div class="espaceHor"></div>
            <div>
                <div class="triple"></div>
                <div class="info colonne">
                    <label for="imagePizza">Image</label>
                    <?php
                    if($mode=="ajouter")
                    {
                        echo'<input type="file" id="image" '.$disabled.' name="imagePizza" required>';
                    }
                    else
                    {
                        
                        echo'<input type="text" name="imagePizza" hidden value="'.$uneRecette->getImagePizza().'">';
                        echo'<img id="image" alt="image du produit" src="IMG/'.$uneRecette->getImagePizza().'">';
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
            echo '<a href="index.php?page=ListeRecettes"><button type="button" class="bouton"><i class="far fa-arrow-alt-circle-left"></i>&nbsp Retour</button></a>';
            
            ?>
            </div>
            <div>
                <div class="info">
                    <div class="erreur"></div>
                </div>
            </div>
            
            </div>