
<?php
$taillesPizzas = TaillespizzasManager::getList();
echo '<section class="colonne">

    <div class="doubleHor"></div>


    <div class="zoneBouton">
        <div></div>
        <div class="grande">
            <div><a href="index.php?page=FormTaillepizza&mode=ajouter"><button class="bouton"><i
                            class="fas fa-plus-circle"></i> &nbsp Ajouter</button></a></div>

            <div><a href="index.php?page=InterfaceDonnees"><button class="bouton"><i class="far fa-arrow-alt-circle-left"></i> &nbsp Retour</button></a></div>
        </div>
        
    </div>

    <div class="doubleHor"></div>';
    echo '<div class="info">
    <div class="case centre">
    <div class="taillepizza">libelle</div>
    </div>
    <div class="case centre">
    <div class="taillepizza">tarif supplément</div>
    </div>
    <div class="triple centre"></div>    
    </div>
    <div class="doubleHor"></div>';
foreach ($taillesPizzas as $uneTaillePizza) {

    echo '<div class="info colonne">
                <div class="case grande centre">
                <div class="taillepizza">' . $uneTaillePizza->getLibelleTaillePizza(). '</div>
                <div class="taillepizza">' . $uneTaillePizza->getTarifSupplement(). '</div>
                <div class="triple centre">
                    <a href="index.php?page=FormRecette&mode=modifier&id=' . $uneTaillePizza->getLibelleTaillePizza() . '"><button class="bouton"><i class="fas fa-edit"></i> Modifier</button></a>
                    <div class="mini"></div>
                    <a href="index.php?page=FormRecette&mode=supprimer&id=' . $uneTaillePizza->getLibelleTaillePizza() . '"><button class="bouton"><i class="fas fa-trash-alt"></i> Supprimer</button></a>
                    
                </div>';

    echo '</div>
    <div class="espaceHor"></div>';

}

echo '</section>';

