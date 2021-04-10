<header>
    <div class="logo"></div>
    <div class="titre texteclair centre"><h1>O'SPEED PIZZA</div>
    <div class="connexion centre">
        <?php
        if (isset($_SESSION['user'])) {
            echo '<div class="texteClair">' . $_SESSION['user']->getPrenomUser().' '. $_SESSION['user']->getNomUser().'</div>';
            echo '<a href="index.php?page=ActionConnexion&mode=logout">
            <button class="bouton centre"><i class="fas fa-sign-out-alt"></i> Deconnexion</button>
            </a>';
        }
        ?>
    </div>
        
</header>
<div class="container">
<div class="espaceHor"></div>