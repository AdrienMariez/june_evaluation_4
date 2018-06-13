<?php

//FILE : Called for all interaction with the database.

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database {
    private static $link = null ;

    private static function getLink() {
        if ( self :: $link ) {
            return self :: $link ;
        }

        $servername = "localhost";
        $username = "root";
        $password = "casio";
        $dbname = "eval_4";
        $charset = 'utf8';
        $collate = 'utf8_unicode_ci';

        //$conn = new mysqli($servername, $username, $password, $dbname);

        $dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
        ];

        self :: $link = new PDO ( $dsn, $username, $password, $options ) ;

        return self :: $link ;
    }

    public static function __callStatic ( $name, $args ) {
        $callback = array ( self :: getLink ( ), $name ) ;
        return call_user_func_array ( $callback , $args ) ;
    }
}
?>