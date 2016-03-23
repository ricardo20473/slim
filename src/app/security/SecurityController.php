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
    
    public function Token($response){
        
        if ($this->usuario) {
            
            $listar = $this->usuario->Listar();

            $this->response->setResponse($listar,$response);
            
            return $response;
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }            
    }
}