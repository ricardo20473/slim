<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Config\Response;

class UsuarioController 
{   
    public function __CONSTRUCT()
    {
        $this->usuario = new Usuario();
        $this->response = new Response();
    }
    
    public function Listar($app){
        
        if ($this->usuario) {
            $listar = $this->usuario->Listar();

            $this->response->setResponse($listar,$app);
            
            return $this->response;
        }else{
            return  "error";
        }            
    }
}