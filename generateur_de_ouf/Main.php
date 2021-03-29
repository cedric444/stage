<?php
/**************   IMPORT DES FICHIERS NECESSAIRES **************/
require('demandeInfos.php');
require('creationStructure.php');
require('connexionDb.php');
echo ' _______________________________________________'."\n";
echo '|                                               |'."\n";
echo '| BIENVENUE DANS LE GENERATEUR DE FOUUUUUU !!!! |'."\n";
echo '|_______________________________________________|'."\n\n";

/***********************     INFOS     *******************************/ 
$chemin = demandeChemin();
echo ' _______________________________________________'."\n\n";
$infoProjet = demandeNomProjet($chemin);

$nomProjet = $infoProjet[0];

$repository = $infoProjet[1];
echo ' _______________________________________________'."\n\n";
$nomDb = demandeNomDB();

/***********************     CONNEXION     *******************************/
$jeton = connectDb($nomDb);

/*****************************    RECUPERATION DE LA BDD    ******************************/
$tables = recupTable($jeton,$nomDb);

/*    =====   Creation de la structure   =====   */
creationStructure($chemin, $nomProjet, $nomDb, $repository, $tables);

for($i=0;$i<count($tables);$i++)
{
    $baseDeDonnees[$tables[$i]] = recupColonne($jeton,$nomDb,$tables[$i]); // Tableau associatif comprenant pour les clés le nom des tables etpour les valeurs les colonnes de chaques tables
}

/******************************   CREATION DES FICHIERS .CLASS.PHP   ******************************/

foreach ($baseDeDonnees as $nomTable => $colonne)
{
    genereClasse($chemin,$nomProjet,$nomTable, $colonne);
}


/******************************   CREATION DES FICHIERS MANAGER.PHP   ******************************/

foreach ($baseDeDonnees as $nomTable => $colonne)
{
    genereManager($chemin,$nomProjet,$nomTable, $colonne);
    genereTestManager($chemin,$nomProjet,$nomTable,$colonne);
}

echo '*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*'."\n";
echo '| MADE BY Maxime Bruno Pierre Marvine Quentin |'."\n";
echo '*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*'."\n";