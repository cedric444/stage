<?php

function genereHautPage($nomTable,$fichier)
{
    $nomTable = strtoupper($nomTable[0]).substr($nomTable,1);
    $uneTable = $nomTable[strlen($nomTable)-1] === "s" ? substr($nomTable,0,strlen($nomTable)-1) : $nomTable;
    
    echo '<?php'."\n\n"
    ."\n".'echo \'<div class="contenu colonne">\''
    ."\n".'<div>'
    ."\n".'<div></div>'
    ."\n".'<div class="titreliste">Liste de '.$nomTable.'</div>'
    ."\n".'<div></div>'
    ."\n".'</div>'
    ."\n\t".'<div class="margeV">'
    ."\n\t\t".'<div></div>'
    ."\n\t\t".'<div class="ajouter centrer"><a class="centre size" href="index.php?page=Formulaire'.$nomTable.'&mode=ajouter"></a></div>'
    ."\n\t\t".'<div></div>'
    ."\n\t".'</div>;'
    ."\n".'foreach ('.$nomTable.' as $un(e) '.$uneTable.')'
    ."\n".'{'
    ."\n\t".'echo \'<div class="margeV">'
    ."\n\t".'<div class="espace"></div>'
    ."\n\t".'<div class="libelle centre">'.$uneTable.'->getNomProduit'
    ."\n\t".
    ."\n\t".
    ."\n\t".
    ."\n\t".

}
