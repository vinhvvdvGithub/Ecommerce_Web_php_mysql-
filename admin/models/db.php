<?php
    //session_unset();
  session_start();
  
class Db
{
    public static $connection;
    public function __construct()
    {

        if(!isset($_SESSION['user'] ))
        {
            header("location: ../userlogin.php");
        }
        

        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,PORT);
            self::$connection->set_charset(DB_CHARSET);
        }
        return self::$connection;
    }
}