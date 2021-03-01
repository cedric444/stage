<?php
if (isset($_POST['name']) && isset($_POST['pass'])) {
    
    $ldaprdn = "EUPEC\\". $_POST['name']; 
    $ldappass = $_POST['pass']; 

    $ldapconn = ldap_connect("eupec.fr");

    if ($ldapconn) {
        $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);

        if ($ldapbind) {
            $checkName = UtilisateurManager::getByName($_POST['name']);
            
            if ($checkName->getIdentifiant() != $_POST['name']) {
                $user = new Utilisateur(['identifiant' => $_POST['name'], 'roleUtilisateur' => 1]);
                UtilisateurManager::add($user);
            }
            
            $dataName = explode(".", $_POST['name']);
            $_SESSION['name'] = $dataName[0];
        } 
        else {
            $message = "Vos identifiants ne sont pas corrects !";
        }
    }
}
else {
    $message = "Merci de remplir correctement vos identifiants.";
}
?>

<div id="container">
    <div id="content">
    <p><a href="index.php?a=home">retour à l'accueil</a></p>

    <?php
    if (isset($_SESSION['name'])) {
        echo '<h1>Espace privé</h1>';
        echo 'Bonjour ' . $_SESSION['name'];
        echo '<a href="index.php?a=logout" alt="">Se déconnecter</a>';
    }
    else {
    ?>

        <h1>Connexion LDAP</h1>
        <p>
        <?php 
        // echo $message; 
        ?>
        </p>

        <form action="" method="POST">
            <label form="name">Identifiant</label>
            <input type="text" name="name" id="name" placeholder="Prénom.Nom" required>
            <label form="pass">Mot de passe</label>
            <input type="password" name="pass" id="pass" required>
            <input id="buttonOnlyOnline" type="submit" value="Se connecter">
        </form>

    <?php 
    }
    ?>

    </div>
</div>