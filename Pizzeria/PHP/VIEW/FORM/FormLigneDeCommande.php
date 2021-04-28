<section>

<?php

$mode=$_GET["mode"];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $uneLigneDeCommande = LignesdecommandesManager::findById($id);
} else {
    $uneLigneDeCommande = new LignesdecommandesManager();
}

$formAction = '<form action="index.php?page=ActionLigneDeCommande&mode='.$mode.'" method="POST" >';

switch ($mode) {
    case "ajouter":
        {
            $idLigneDeCommandeHidden = '<input value="" type= "hidden">';
            $disabled = '';
            $submit = '<button id="submit" class="bouton" type="submit" disabled><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
            break;
        }
    case "modifier":
        {
            $idLigneDeCommandeHidden = '<input name= "idProduit" value="' . $uneLigneDeCommande->getIdLigneDeCommande() . '" type= "hidden">';
            $disabled = '';
            $submit = '<button class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
            
            break;
        }
    case "details":
        {
            $idLigneDeCommandeHidden = '<input name= "idProduit" value="' . $uneLigneDeCommande->getIdLigneDeCommande() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = "";
            break;
        }
    case "supprimer":
        {
            $idLigneDeCommandeHidden = '<input name= "idProduit" value="' . $uneLigneDeCommande->getIdLigneDeCommande() . '" type= "hidden">';
            $disabled = 'disabled';
            $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button><div class="mini"></div>';
            break;
        }
}

echo $formAction;
echo $idLigneDeCommandeHidden;

?>
