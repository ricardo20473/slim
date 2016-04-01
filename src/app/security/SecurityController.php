<?php

namespace App\Controllers;

session_start();

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
            $token = $this->response->CreateToken();
            
            if ($filtrar && $token) {
                if ($filtrar[0]['usuario'] == $request['usuario'] && $filtrar[0]['contrasena'] == $request['contrasena']) {
                    $_SESSION["token"] = $token;
                    $_SESSION["time"] = date("H:i:s",strtotime('+60 minutes'));
                    $filter = array_merge($filtrar[0],array("token" => $token));
                    return $this->response->setResponse($filter);
                }else{
                    return $this->response->setResponse(array(ICommons::ERROR_401 => ICommons::INVALID_RECORD_NOT_EXIST));
                }
            }else{
                
                return $this->response->setResponse(array(ICommons::ERROR_401 => ICommons::INVALID_NOT_CREDENTIALS));
            }

        }else{
            return $this->response->setResponse(array(ICommons::ERROR_500 => ICommons::UNEXPECTED_ERROR));
        }            
    }
}