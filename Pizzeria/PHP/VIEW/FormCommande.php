<section>

    <?php

$mode = $_GET['mode'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $uneCommande = CommandesManager::findById($id);
} else {
    $uneCommande = new Recettes();
}
$formAction = '<form action="index.php?page=ActionCommande&mode='.$mode.'" method="POST">';

switch ($mode) {
    case "ajouter":
        {
            $idCommandeHidden = '<input value="" type= "hidden">';
            $disabled = '';
            $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
            break;
        }
    case "modifier":
        {
            $idCommandeHidden = '<input name= "idCommande" value="' . $uneCommande->getIdCommande() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            break;
        }
    case "details":
        {
            $idCommandeHidden = '<input name= "idCommande" value="' . $uneCommande->getIdCommande() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            break;
        }
    case "supprimer":
        {
            $idCommandeHidden = '<input name= "idCommande" value="' . $uneCommande->getIdCommande() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
            break;
        }
}

echo $formAction;
echo $idCommandeHidden;

?>
            <div>
                <div class="info colonne triple">
                    <label for="numCommande">Numéro de commande</label>
                    <input type="text" id="numCommande" <?=$disabled;?> name="numCommande" value="<?=$uneCommande->getNumCommande();?>" required pattern="[0-9]{0,}">
                </div>
                <div class="info colonne grande">
                    <label for="dateCommande">date de la commande</label>
                    <input type="date" id="dateCommande" <?=$disabled;?> name="dateCommande"
                    value="<?php echo $uneCommande->getDateCommande();?>">
                </div>
                <div class="info colonne  grande">
                    <label for="nbPointFidelite">Points de Fidélité</label>
                    <input type="text" id="nbPointFidelite" <?=$disabled;?> name="nbPointFidelite" required
                    pattern="^[0-9]{0,}$" value="<?php echo $uneCommande->getNbPointFidelite(); ?>">
                </div>
                <div class="info colonne grande">
                    <label for="horaireLivraison">Horaire de horaireLivraison</label>
                    <input type="time" id="horaireLivraison" <?=$disabled;?> name="horaireLivraison"
                    pattern="^[1-2]{1}[0-9]{1}[:]{1}[0-9]{2}$" value ="<?php echo $uneCommande->getHoraireLivraison();?>">
                </div>
                        
            </div>
            <div class="espaceHor"></div>
            <div class="info">
            <?php
            
            echo $submit;
            echo '<a href="index.php?page=ListeCommandes"><div class="bouton"><i class="far fa-arrow-alt-circle-left"></i>&nbsp Retour</div></a>';
            
            ?>
            </div>
            <div>
                <div class="info">
                    <div class="erreur"></div>
                </div>
            </div>
            
            </div>