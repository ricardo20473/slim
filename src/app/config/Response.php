<?php

namespace App\Config;

use App\Config\ICommons; 

class Response
{
    public $resultado     = "";
    public $mensaje       = "";
    
    public function setResponse($data, $response)
    {   
        $response->withHeader('Content-Type', 'application/json; charset=utf-8');

        if ($data != null) {
            if (!array_key_exists('status', $data)) {
                $response->withStatus(ICommons::HTTP_200);
                $this->resultado = ICommons::HTTP_200_MSG;
                $this->mensaje = $data;
            }else{
                $response->withStatus(ICommons::HTTP_409);
                $this->resultado = ICommons::HTTP_409_MSG;
                $this->mensaje = $data;
            }
        }else{
            $response->withStatus(ICommons::HTTP_500);
            $this->resultado = ICommons::HTTP_500_MSG;
            $this->mensaje = ICommons::UNEXPECTED_ERROR;
        }
    }
}