<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController 
{   
    public function __CONSTRUCT()
    {
        $this->usuario = new UsuarioModel();
    }
    
    public function Listar(){
        
        if ($this->usuario) {
            $listar = $this->usuario->ListarUsuario();
            return json_encode($listar);
        }else{
            return  "error";
        }            
    }
    
}