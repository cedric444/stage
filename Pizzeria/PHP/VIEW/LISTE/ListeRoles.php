
<?php
$roles = RolesManager::getList();
echo '<section class="colonne">

    <div class="doubleHor"></div>


    <div class="zoneBouton">
        <div></div>
        <div class="grande">
            <div><a href="index.php?page=FormRole&mode=ajouter"><button class="bouton"><i
                            class="fas fa-plus-circle"></i> &nbsp Ajouter</button></a></div>

            <div><a href="index.php?page=InterfaceDonnees"><button class="bouton"><i class="far fa-arrow-alt-circle-left"></i> &nbsp Retour</button></a></div>
        </div>
        
    </div>

    <div class="doubleHor"></div>';
    echo '<div class="info ">
    <div class="case grande">
    <div class="role">Libellé rôle</div>
    </div>
    <div class="triple">
    </div>
    </div>
    <div class="doubleHor"></div>';
foreach ($roles as $unRole) {

    echo '<div class="info ">
                <div class="case grande">
                <div class="role">' . $unRole->getLibelleRole() . '</div>
                </div>

                <div class="triple">
                    <div class="mini"></div>
                    <a href="index.php?page=FormRole&mode=modifier&id=' . $unRole->getIdRole() . '"><button class="bouton"><i class="fas fa-edit"></i> Modifier</button></a>
                    <div class="mini"></div>
                    <div class="mini"></div>
                    <a href="index.php?page=FormRole&mode=supprimer&id=' . $unRole->getIdRole() . '"><button class="bouton"><i class="fas fa-trash-alt"></i> Supprimer</button></a>
                    <div class="mini"></div>
                </div>';

    echo '</div>
    <div class="espaceHor"></div>';

}

echo '</section>';
