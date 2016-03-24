<?php

namespace App\Config;

use App\Config\ICommons; 

class Response
{
    public $resultado     = "";
    public $mensaje       = "";
    
    public function setResponse($data)
    {   
        $responses = array();
        $responses['header'] = 'Content-Type'.','.'application/json; charset=utf-8';

        if ($data != null) {
            if (!array_key_exists('status', $data)) {
                $responses['status'] = ICommons::HTTP_200;
                $this->resultado = ICommons::HTTP_200_MSG;
                $this->mensaje = $data;
                $responses['mensaje'] = $this;
            }else{
                $responses['status'] = ICommons::HTTP_409;
                $this->resultado = ICommons::HTTP_409_MSG;
                $this->mensaje = $data;
                $responses['mensaje'] = $this;
            }
        }else{
            $responses['status'] = ICommons::HTTP_500;
            $this->resultado = ICommons::HTTP_500_MSG;
            $this->mensaje = ICommons::UNEXPECTED_ERROR;
            $responses['mensaje'] = $this;
        }

        return $responses;
    }
}