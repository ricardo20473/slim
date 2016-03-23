<?php

namespace App\Config;

class Response
{
    public $resultado     = "Error";
    public $mensaje       = 'Ocurrio un error inesperado.';
    //public $response     = false;
    // public $href       = null;
    // public $function   = null;
    // public $filter     = null;
    
    public function setResponse($data, $app)
    {   
        $app->withHeader('Content-Type', 'application/json; charset=utf-8');

        if ($data != null) {
            $app->withStatus(200);
            $this->resultado = "Ok";
            $this->mensaje = $data;
        }else{
            // $this->resultado = "Error";
            // $this->mensaje = 'Ocurrio un error inesperado';
        }
    }
}