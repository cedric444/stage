<?PHP
function load($class)
{
    if (file_exists("PHP/Controller/" . $class . ".Class.php"))
        require "PHP/Controller/" . $class . ".Class.php";
    if (file_exists("PHP/Model/" . $class . ".Class.php"))
        require "PHP/Model/" . $class . ".Class.php";
}
spl_autoload_register("load");

Parametre::init();
DbConnect::init();
session_start();

function display($page)
{
    $path = $page[0];
    $name = $page[1];
    $title = $page[2];

    include 'PHP/View/_Header.php';
    include $path . $name . '.php';
    include 'PHP/View/_Footer.php';
}

$routes = [
    "default" => ["PHP/View/", "home", "Accueil"],

    "bdd" => ["PHP/View/", "bdd", "Base de données"],
    "actExpense" => ["PHP/View/", "actExpense", ""],
    
    "ldap" => ["PHP/View/", "ldap", "Connexion LDAP"],
    "logout" => ["PHP/View/", "logout", ""]
];

if (isset($_GET["a"])) {
    $action = $_GET["a"];

    if (isset($routes[$action]))
        display($routes[$action]);
    else
        display($routes["default"]);
}
else
    display($routes["default"]);