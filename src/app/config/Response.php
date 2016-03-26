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

    public function Token($request){
        $key = $request->getHeader(ICommons::HEADER_API_KEY);
        $api_key = "";
        $responses = array();
        
        foreach ($key as $value) {
            $api_key = $value;
        }

        if ($api_key === ICommons::API_KEY) {
            $responses['token'] = true;
        }else{
            $responses['status'] = ICommons::HTTP_401;
            $this->resultado = ICommons::HTTP_401_MSG;
            $this->mensaje = ICommons::HEADER_INVALID_AUTH_HEADERS;
            $responses['mensaje'] = $this;
        }

        return $responses;
    }
}