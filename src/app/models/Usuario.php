<?php
namespace App\Models;

use App\Config\DataBase;
use App\Config\ICommons; 

class Usuario
{
    private $db;
    private $table = 'usuario';

    public function __CONSTRUCT(){
        //$this->db = DataBase::StartUp();
        $this->db = DataBase::StartUpMysql();
    }

    public function Get(){
        try {
            $data = $this->db->select()->from($this->table);
            $dato = $data->execute();
            $datas = $dato->fetchAll();

            return $datas;

        } catch (Exception $e) {
            return ICommons::UNEXPECTED_ERROR.": " . $e->getMessage();
        }
    }

    public function BuscarPorId($id){
        try{
            $data = $this->db->select()->from($this->table)->where('id', '=', $id);
            $dato = $data->execute();
            $datas = $dato->fetch();

            return $datas;

        } catch (Exception $e){
            return ICommons::UNEXPECTED_ERROR.": " . $e->getMessage();
        }
    }

    public function BuscarPorLike($like){
        try{
            $array = explode("=", $like);
            $data = $this->db->select()->from($this->table)->whereLike($array[0], '%'.$array[1].'%');
            $dato = $data->execute();
            $datas = $dato->fetchAll();

            return $datas;

        } catch (Exception $e){
            return ICommons::UNEXPECTED_ERROR.": " . $e->getMessage();
        }
    }

    public function Listar($filtrar){
        try{
            $array = explode("=", $filtrar);
            $data = $this->db->select()->from($this->table)->where($array[0], '=', $array[1]);
            $dato = $data->execute();
            $datas = $dato->fetchAll();

            return $datas;

        } catch (Exception $e){
            return ICommons::UNEXPECTED_ERROR.": " . $e->getMessage();
        }
    }
}