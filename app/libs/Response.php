<?php

namespace App\Libs;

class Response
{
    public $resultado     = "Error";
    public $mensaje       = 'Ocurrio un error inesperado.';
    // public $response   = false;
    // public $href       = null;
    // public $function   = null;
    // public $filter     = null;
    
    public function setResponse($resultado, $m = '')
    {
        $this->resultado = $resultado;
        $this->mensaje = $m;

        if(!$resultado && $m = ''){
            $this->resultado = 'Error';
            $this->mensaje = 'Ocurrio un error inesperado';
        } 
    }
}