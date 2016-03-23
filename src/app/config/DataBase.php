<?php

namespace App\Config;

use PDO;

class DataBase
{   
    public static function StartUpMysql(){
        try {
            $dsn = 'mysql:host=localhost;dbname=project_venta;charset=utf8';
            $usr = 'root';
            $pwd = '1234';

            $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
            return $pdo;

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //Conexion a mysql
    public static function StartUp()
    {
        try {
            $db_host = "localhost";
            $db_dbname = "project_venta";
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

    //Conexion a postgresql
    public static function StartUpPsql()
    {
        try {
            $db_host = "localhost";
            $db_dbname = "project_venta";
            $db_username = "postgres";
            $db_password = "postgres";

            $dsn = "pgsql:host=$db_host;port=5432;dbname=$db_dbname;user=$db_username;password=$db_password";

            $conexion = new PDO($dsn);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $conexion;
    }
}