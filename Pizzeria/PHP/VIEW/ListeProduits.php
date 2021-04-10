
<?php
$produits = ProduitsManager::getList();
echo '<section class="colonne">

    <div class="doubleHor"></div>


    <div class="zoneBouton">
        <div></div>
        <div class="grande">
            <div><a href="index.php?page=FormProduit&mode=ajouter"><button class="bouton"><i
                            class="fas fa-plus-circle"></i> &nbsp Ajouter</button></a></div>

            <div><a href="index.php?page=InterfaceDonnees"><button class="bouton"><i class="far fa-arrow-alt-circle-left"></i> &nbsp Retour</button></a></div>
        </div>
        
    </div>

    <div class="doubleHor"></div>';
    echo '<div class="info">
    <div class="case centre">
    <div class="user">libelle</div>
    </div>
    <div class="triple centre"></div>    
    </div>
    <div class="doubleHor"></div>';
foreach ($produits as $unProduit) {

    echo '<div class="info colonne">
                <div class="case grande centre">
                <div class="produit">' . $unProduit->getLibelleProduit(). '</div>
                
                <div class="triple centre">
                    <a href="index.php?page=FormProduit&mode=details&id=' . $unProduit->getIdProduit() .'"><button class="bouton"><i class="fas fa-info-circle"></i> Détail</button></a>
                    <div class="mini"></div>
                    <a href="index.php?page=FormProduit&mode=modifier&id=' . $unProduit->getIdProduit() . '"><button class="bouton"><i class="fas fa-edit"></i> Modifier</button></a>
                    <div class="mini"></div>
                    <a href="index.php?page=FormProduit&mode=supprimer&id=' . $unProduit->getIdProduit() . '"><button class="bouton"><i class="fas fa-trash-alt"></i> Supprimer</button></a>
                </div>';

    echo '</div>
    <div class="espaceHor"></div>';

}

echo '</section>';

