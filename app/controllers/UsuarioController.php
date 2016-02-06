<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Libs\Response;

class UsuarioController 
{   
    public function __CONSTRUCT()
    {
        $this->usuario = new UsuarioModel();
        $this->response = new Response();
    }
    
    public function Listar($app){
        
        if ($this->usuario) {
            $listar = $this->usuario->Listar();

            $this->response->setResponse($listar,$app);
            
            return json_encode($this->response);
        }else{
            return  "error";
        }            
    }

    public function findByPK($id,$app){
        
        if ($this->usuario) {
            $filtrarPk = $this->usuario->findByPK($id);

            $this->response->setResponse($filtrarPk,$app);
            
            return json_encode($this->response);
        }else{
            $this->response->setResponse($filtrarPk,$app);
            return  json_encode($this->response);
        }            
    }

    public function registrar($app){
        if ($this->usuario) {
            
            $registrar = $this->usuario->registrar($app);

            $filtrarPk = $this->usuario->findByPK($registrar);

            $this->response->setResponse($filtrarPk,$app);

            return json_encode($this->response);
        }else{

        }
    }

    public function modificar($id,$app){
        if ($this->usuario) {
            
            $modificar = $this->usuario->modificar($id,$app);

            $filtrarPk = $this->usuario->findByPK($modificar);

            $this->response->setResponse($filtrarPk,$app);

            return json_encode($this->response);
        }else{

        }
    }

    public function eliminar($id,$app){
        if ($this->usuario) {
            
            $eliminar = $this->usuario->eliminar($id);

            $this->response->setResponse($eliminar,$app);

            return json_encode($this->response);
        }else{

        }
    }
    
}