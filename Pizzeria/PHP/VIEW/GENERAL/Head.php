<!doctype html>
<html lang="fr">
<?php
if (isset($_SESSION)) {
    $currentUser = $_SESSION;
}
?>
<head>
	<meta charset="utf-8">
	<title><?php echo $titre ?></title>
	<script src="https://kit.fontawesome.com/ce4feb7268.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./CSS/Root.css">
	<link rel="stylesheet" href="./CSS/Style.css">
	<link rel="stylesheet" href="./CSS/Phone.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="colonne">
