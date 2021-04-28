
<?php
$commandes = CommandesManager::getList();
echo '<section class="colonne">

    <div class="doubleHor"></div>


    <div class="zoneBouton">
        <div></div>
        <div class="grande">
            <div><a href="index.php?page=FormCommande&mode=ajouter"><button class="bouton"><i
                            class="fas fa-plus-circle"></i> &nbsp Ajouter</button></a></div>

            <div><a href="index.php?page=InterfaceDonnees"><button class="bouton"><i class="far fa-arrow-alt-circle-left"></i> &nbsp Retour</button></a></div>
        </div>
        
    </div>

    <div class="doubleHor"></div>';
    echo '<div class="info">
    <div class="case centre">
    <div class="commande">Numéro commande</div>
    </div>
    <div class="triple centre"></div>    
    </div>
    <div class="doubleHor"></div>';
foreach ($commandes as $uneCommande) {

    echo '<div class="info colonne">
                <div class="case grande centre">
                <div class="commande">' . $uneCommande->getNumCommande(). '</div>
                
                <div class="triple centre">
                    <a href="index.php?page=FormCommande&mode=details&id=' . $uneCommande->getIdCommande() .'"><button class="bouton"><i class="fas fa-info-circle"></i> Détail</button></a>
                    <div class="mini"></div>
                    <a href="index.php?page=FormCommande&mode=modifier&id=' . $uneCommande->getIdCommande() . '"><button class="bouton"><i class="fas fa-edit"></i> Modifier</button></a>
                    <div class="mini"></div>
                    <a href="index.php?page=FormCommande&mode=supprimer&id=' . $uneCommande->getIdCommande() . '"><button class="bouton"><i class="fas fa-trash-alt"></i> Supprimer</button></a>
                    
                </div>';

    echo '</div>
    <div class="espaceHor"></div>';

}

echo '</section>';

