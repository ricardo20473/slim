<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Config\Response;
use App\Config\ICommons; 

class UsuarioController 
{   
    public function __CONSTRUCT()
    {
        $this->usuario = new Usuario();
        $this->response = new Response();
    }
    
    public function Get($response){
        
        if ($this->usuario) {
            
            $get = $this->usuario->Get();

            $this->response->setResponse($get,$response);
            
            return $this->response;
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }            
    }

    public function BuscarPorId($id,$response){
        
        if ($this->usuario) {

            $filtrarId = $this->usuario->BuscarPorId($id);

            $this->response->setResponse($filtrarId,$response);
            
            return $this->response;
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }            
    }

    public function BuscarPorLike($like,$response){
        
        if ($this->usuario) {

            $like = $this->usuario->BuscarPorLike($like);

            $this->response->setResponse($like,$response);
            
            return $this->response;
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }            
    }

    public function Listar($filtrar,$response){
        
        if ($this->usuario) {

            $filtrar = $this->usuario->Listar($filtrar);

            $this->response->setResponse($filtrar,$response);
            
            return $this->response;
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }            
    }
}