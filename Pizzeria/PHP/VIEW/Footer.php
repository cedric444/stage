
</div>
<footer>
    <h3>&copy;Cedric Pietka</h3>
</footer>
<?php
if (isset($page)) {
    preg_match("/Liste|Form/", $page[1], $matches);
    if ($matches != null) {
        if ($matches[0] == "Liste") {
            echo '<script src="./JS/FiltresListe.js"></script>';
        } else if ($matches[0] == "Form") {
            echo '<script src="./JS/VerifForm.js"></script>';
        } else {
            echo '';
        }
    }
}

switch ($page[1]) {
    case "Menu":echo '<script src="./JS/VerifMenu.js"></script>';
            break;
}
?>
</body>
</html>