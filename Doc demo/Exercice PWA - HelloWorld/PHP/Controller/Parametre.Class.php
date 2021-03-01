<?php
class Parametre
{

    private static $_host;
    private static $_port;
    private static $_dbName;
    private static $_login;
    private static $_pwd;

    public static function getHost()
    {
        return self::$_host;
    }

    public static function getPort()
    {
        return self::$_port;
    }

    public static function getDbName()
    {
        return self::$_dbName;
    }

    public static function getLogin()
    {
        return self::$_login;
    }

    public static function getPwd()
    {
        return self::$_pwd;
    }
    public static function init()
    {
        if (file_exists("parametre.ini")) {
            $fic = "parametre.ini";
        } else {
            echo "Pas de fichier de paramètres";
        }

        $flux = fopen($fic, "r");
        while (!feof($flux)) {
            $ligne = fgets($flux, 4096);
            if ($ligne)
            {
                $info = explode(":", $ligne);
                $param[$info[0]] = rtrim($info[1]); 
            }
        }
        self::$_host = $param["Host"];
        self::$_port = $param["Port"];
        self::$_dbName = $param["DbName"];
        self::$_login = $param["Login"];
        self::$_pwd = $param["Pwd"];

    }
}
