<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Config\Response;
use App\Config\ICommons; 

class SecurityController 
{   
    public function __CONSTRUCT()
    {
        $this->usuario = new Usuario();
        $this->response = new Response();
    }
    
    public function Token($request){
        
        if ($this->usuario) {
            
            $filtrar = $this->usuario->Listar($request);
            
            if ($filtrar) {
                return $this->response->setResponse('Usuario existe');
            }else{
                return $this->response->setResponse('Usuario no existe');
            }
            
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }            
    }
}