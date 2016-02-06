<?php
namespace App\Models;

use App\Libs\DataBase;

class UsuarioModel
{
    private $db;
    private $table = 'usuario';
    private $response;
    private static $instance = NULL;
    
    public function __CONSTRUCT(){
        $this->db = DataBase::StartUp();
    }
    
    public function Listar(){
        try{
            $data = $this->db->prepare("SELECT * FROM $this->table");
            $data->execute();
            $datas = $data->fetchAll();
            
            return $datas; 

        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function findByPK($id){
        try{
            $data = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id");
            $data->bindParam("id", $id);
            $data->execute();
            $datas = $data->fetch();
            
            return $datas; 

        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function registrar($app)
    {   
        $body = $app->request()->getBody();
        $datos = json_decode($body);

        try {

            $data = $this->db->prepare("INSERT INTO $this->table VALUES(null, :nombre, :apellido, :email, :usuario, :clave, :cargo, :nivel)");
            $data->bindParam("nombre", $datos->nombre);
            $data->bindParam("apellido", $datos->apellido);
            $data->bindParam("email", $datos->email);
            $data->bindParam("usuario", $datos->usuario);
            $data->bindParam("clave", $datos->clave);
            $data->bindParam("cargo", $datos->cargo);
            $data->bindParam("nivel", $datos->nivel);
            $data->execute();
            $datas = $this->db->lastInsertId();
            
            return $datas; 

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function modificar($id,$app){   
        $body = $app->request()->getBody();
        $datos = json_decode($body);

        try {

            $data = $this->db->prepare("UPDATE $this->table SET 
                                                nombre = :nombre, 
                                                apellido = :apellido, 
                                                email = :email, 
                                                usuario = :usuario, 
                                                clave = :clave, 
                                                cargo = :cargo, 
                                                nivel = :nivel 
                                                where id = :id");

            $data->bindParam("id", $id);
            $data->bindParam("nombre", $datos->nombre);
            $data->bindParam("apellido", $datos->apellido);
            $data->bindParam("email", $datos->email);
            $data->bindParam("usuario", $datos->usuario);
            $data->bindParam("clave", $datos->clave);
            $data->bindParam("cargo", $datos->cargo);
            $data->bindParam("nivel", $datos->nivel);
            $data->execute();
            
            return $id; 

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function eliminar($id){
        try {
            
            $data = $this->db->prepare("DELETE FROM $this->table WHERE id = :id");
            $data->bindParam("id", $id);
            $data->execute();

            return "Eliminado";

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}