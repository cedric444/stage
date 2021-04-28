<section>

    <?php

$mode = $_GET['mode'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $uneTaillePizza = TaillesPizzasManager::findById($id);
} else {
    $uneTaillePizza = new TaillesPizza();
}
$formAction = '<form action="index.php?page=ActionTaillePizza&mode='.$mode.'" method="POST">';

switch ($mode) {
    case "ajouter":
        {
            $idTaillePizzaHidden = '<input value="" type= "hidden">';
            $disabled = '';
            $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
            break;
        }
    case "modifier":
        {
            $idTaillePizzaHidden = '<input name= "idTaillePizza" value="' . $uneTaillePizza->getIdTaillePizza() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            break;
        }
    case "details":
        {
            $idTaillePizzaHidden = '<input name= "idTaillePizza" value="' . $uneTaillePizza->getIdTaillePizza() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            break;
        }
    case "supprimer":
        {
            $idTaillePizzaHidden = '<input name= "idTaillePizza" value="' . $uneTaillePizza->getIdTaillePizza() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
            break;
        }
}

echo $formAction;
echo $idTaillePizzaHidden;

?>
            <div>
                <div class="info colonne ">
                    <label for="libelleTaillePizza">Libelle</label>
                    <input type="text" id="libelleTaillePizza" <?=$disabled;?> name="libelleTaillePizza" value="<?=$uneTaillePizza->getLibelleTaillePizza();?>" required pattern="[a-zA-Z- ]{3,}">
                </div>
                <div class="info colonne  grande">
                    <label for="tarifSupplement">tarif supplement</label>
                    <input type="text" id="tarifSupplement" <?=$disabled;?> name="tarifSupplement" required
                    pattern="^[0-9]{1,2}[.,]{1}[0-9]{1,2}$" value="<?php echo $uneTaillePizza->getTarifSupplement(); ?>">
                </div>
                        
            </div>
            <div class="espaceHor"></div>
            <div class="info">
            <?php
            
            echo $submit;
            echo '<a href="index.php?page=ListeTaillesPizza"><div class="bouton"><i class="far fa-arrow-alt-circle-left"></i>&nbsp Retour</div></a>';
            
            ?>
            </div>
            <div>
                <div class="info">
                    <div class="erreur"></div>
                </div>
            </div>
            
            </div>