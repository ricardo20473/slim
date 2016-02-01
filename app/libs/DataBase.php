<?php

namespace App\Libs;

use PDO;

class DataBase
{
    public static function StartUp()
    {
        try {
            $db_host = "localhost";
            $db_dbname = "proyecto";
            $db_username = "root";
            $db_password = "1234";

            $mysql_conn_string = "mysql:host=$db_host;dbname=$db_dbname;charset=utf8";
            
            $conexion = new PDO($mysql_conn_string, $db_username, $db_password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
        return $conexion;
    }
}