<?php
namespace App\Models;

use App\Libs\DataBase;
use App\Libs\Response;

class UsuarioModel
{
    private $db;
    private $table = 'usuario';
    private $response;
    private static $instance = NULL;
    
    public function __CONSTRUCT()
    {
        $this->db = DataBase::StartUp();
        $this->response = new Response();
    }
    
    public function ListarUsuario()
    {
        try
        {
            $mensaje = array();

            $data = $this->db->prepare("SELECT * FROM $this->table");
            $data->execute();
            $datas = $data->fetchAll();

            $this->response->setResponse("Ok");
            $this->response->mensaje = $datas;
            
            return $this->response;
        }
        catch(Exception $e)
        {
            $this->response->setResponse("Error", $e->getMessage());
            return $this->response;
        }
    }
}