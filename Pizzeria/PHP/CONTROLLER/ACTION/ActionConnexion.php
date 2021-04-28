<?php
if (isset($_POST["mailUser"])) {
    $user = UsersManager::getByEmail($_POST['mailUser']);
}

$mode = isset($_GET["mode"]) ? $_GET["mode"] : "login";
switch ($mode) {
    case 'login':
        if ($user != false) {
            if ($_POST['motDePasse'] == $user->getMotDePasse()) {
                $_SESSION['user'] = $user;
                header("location: index.php?page=InterfaceUser&idRole=" . $user->getIdRole());
            } else {
                echo '<div class="titreColonne zoneBouton">le mot de passe ou eMail est incorrect</div>';
                header("refresh:3;url=index.php?page=FormConnexion");
            }
        } else {
            echo '<div class="titreColonne zoneBouton">l\'utilisateur n\'existe pas</div>';
            header("refresh:3;url=index.php?page=FormConnexion");
        }
        break;

    case 'logout':
        session_destroy();
        header("location: index.php?page=FormConnexion");
        break;
}