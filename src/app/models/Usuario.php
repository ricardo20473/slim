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

            if ($datas) {
                return $datas;
            }else{
                return ICommons::INVALID_RECORD_NOT_EXIST;
            }
        } catch (Exception $e){
            return ICommons::UNEXPECTED_ERROR.": " . $e->getMessage();
        }
    }

    public function BuscarPorLike($like){
        try{
            $data = "";
            foreach ($like as $key => $value) {
                $data = $this->db->select()->from($this->table)->whereLike($key, '%'.$value.'%');
            }
            
            $dato = $data->execute();
            $datas = $dato->fetchAll();

            if ($datas) {
                return $datas;
            }else{
                return ICommons::INVALID_RECORD_NOT_EXIST;
            }
            

        } catch (Exception $e){
            return ICommons::UNEXPECTED_ERROR.": " . $e->getMessage();
        }
    }

    public function Listar($filter){
        try{
            $data = $this->db->select()->from($this->table)->whereMany($filter,'=');
            $dato = $data->execute();
            $datas = $dato->fetchAll();

            return $datas;

        } catch (Exception $e){
            return ICommons::UNEXPECTED_ERROR.": " . $e->getMessage();
        }
    }

    public function Registrar($datos){
        try{
            $dataN = array_merge($datos, array('id' => null));
            $data = $this->db->insert(array_keys($dataN))->into($this->table)->values(array_values($dataN));
            $dato = $data->execute(false);
            $datas = $this->db->lastInsertId();

            return $datas;

        } catch (Exception $e){
            return ICommons::UNEXPECTED_ERROR.": " . $e->getMessage();
        }
    }

    public function Actualizar($id,$datos){
        try{
            $data = $this->db->update($datos)->table($this->table)->where('id','=',$id);
            $dato = $data->execute();
            $datas = $id;

            return $datas;

        } catch (Exception $e){
            return ICommons::UNEXPECTED_ERROR.": " . $e->getMessage();
        }
    }

    public function Eliminar($id){
        try{
            $data = $this->db->delete($datos)->from($this->table)->where('id','=',$id);
            $dato = $data->execute();

            if ($dato != null || $dato = "") {
                if ($dato == 1) {
                    return ICommons::DELETE;
                }else{
                    return ICommons::INVALID_RECORD_NOT_EXIST;
                }
            }else{
                return ICommons::INVALID_RECORD_NOT_EXIST;
            }

            

        } catch (Exception $e){
            return ICommons::UNEXPECTED_ERROR.": " . $e->getMessage();
        }
    }
}