<?php
namespace App\Models;

use App\Config\DataBase;

class Usuario
{
    private $db;
    private $table = 'usuario';

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
}