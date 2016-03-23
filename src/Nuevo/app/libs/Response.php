<?php

namespace App\Libs;

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
        $app->response->headers->set("Content-type", "application/json");

        if ($data != null) {
            $app->response->status(200);
            $this->resultado = "Ok";
            $this->mensaje = $data;
        }else{
            $this->resultado = "Error";
            $this->mensaje = 'Ocurrio un error inesperado';
        }
    }
}