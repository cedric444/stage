<header>
    <div class="logo"></div>
    <div class="colonne">
    <div class="titre texteclair centre"><h1>O'SPEED PIZZA</h1></div>
    <div class="titre texteclair centre"><h2><?=$titre;?></h2></div>
    </div>
    <div class="connexion centre">
        <?php
if (isset($_SESSION['user'])) {
    echo '<div class="colonne"><div class="connecte">' . $_SESSION['user']->getPrenomUser() . ' ' . $_SESSION['user']->getNomUser() . '</div>';
    echo '<a href="index.php?page=ActionConnexion&mode=logout">
            <button class="bouton deconnexion centre"><i class="fas fa-sign-out-alt"></i> Deconnexion</button>
            </a></div>';
}
?>
    </div>

</header>
<div class="container">
<div class="espaceHor"></div>
<div class="espaceHor"></div>