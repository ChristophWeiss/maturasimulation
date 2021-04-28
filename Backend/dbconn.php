<?php

class Database
{
    private static $connection = null;

    private function __construct()
    {
    }

    /**
     * @return PDO|null
     */
    public static function getDatabase()
    {


        if (self::$connection == NULL) {
            try {
                $servername = "localhost";
                $connection = "maturasimulation";

                self::$connection = new PDO("mysql:host=$servername;dbname=$connection", 'root', 'Lbshi12345');
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->exec("set names utf8");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$db;
    }
}
