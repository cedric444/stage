
<?php
$users = UsersManager::getList();
echo '<section class="colonne">

    <div class="doubleHor"></div>


    <div class="zoneBouton">
        <div></div>
        <div class="grande">
            <div><a href="index.php?page=FormUser&mode=ajouter"><button class="bouton"><i
                            class="fas fa-plus-circle"></i> &nbsp Ajouter</button></a></div>

            <div><a href="index.php?page=InterfaceDonnees"><button class="bouton"><i class="far fa-arrow-alt-circle-left"></i> &nbsp Retour</button></a></div>
        </div>
        
    </div>

    <div class="doubleHor"></div>';
    echo '<div class="info">
    <div class="case centre">
    <div class="user">nom</div>
    </div>
    <div class="case centre">
    <div class="user">prenom</div>
    </div>
    <div class="triple centre"></div>    
    </div>
    <div class="doubleHor"></div>';
foreach ($users as $unUser) {

    echo '<div class="info colonne">
                <div class="case grande centre">
                <div class="user">' . $unUser->getNomUser(). '</div>
                
                <div class="user">' . $unUser->getPrenomUser(). '</div>
                <div class="triple centre">
                    <a href="index.php?page=FormUser&mode=details&id=' . $unUser->getIdUser() .'"><button class="bouton"><i class="fas fa-info-circle"></i> Détail</button></a>
                    <div class="mini"></div>
                    <a href="index.php?page=FormUser&mode=modifier&id=' . $unUser->getIdUser() . '"><button class="bouton"><i class="fas fa-edit"></i> Modifier</button></a>
                    <div class="mini"></div>
                    <a href="index.php?page=FormUser&mode=supprimer&id=' . $unUser->getIdUser() . '"><button class="bouton"><i class="fas fa-trash-alt"></i> Supprimer</button></a>
                    
                </div>';

    echo '</div>
    <div class="espaceHor"></div>';

}

echo '</section>';
