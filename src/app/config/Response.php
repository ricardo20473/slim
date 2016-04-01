<?php

namespace App\Config;

session_start();

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

            if (array_key_exists(ICommons::ERROR_401, $data)) {
                $responses['status'] = ICommons::HTTP_401;
                $this->resultado = ICommons::HTTP_401_MSG;
                $this->mensaje = $data[ICommons::ERROR_401];
                $responses['mensaje'] = $this;
            }

            if (array_key_exists(ICommons::ERROR_404, $data)) {
                $responses['status'] = ICommons::HTTP_404;
                $this->resultado = ICommons::HTTP_404_MSG;
                $this->mensaje = $data[ICommons::ERROR_404];
                $responses['mensaje'] = $this;
            }

            if (array_key_exists(ICommons::ERROR_500, $data)) {
                $responses['status'] = ICommons::HTTP_500;
                $this->resultado = ICommons::HTTP_500_MSG;
                $this->mensaje = $data[ICommons::ERROR_500];
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
        $token = $request->getHeader(ICommons::HEADER_TOKEN);

        $api_key = "";
        $api_token = "";
        $tokens = $_SESSION["token"];
        $time = $_SESSION["time"];
        $responses = array();
        
        foreach ($key as $value) {
            $api_key = $value;
        }

        foreach ($token as $values) {
            $api_token = $values;
        }

        if ($api_key === ICommons::API_KEY) {
            if ($api_token === $tokens) {
                if (date("H:i:s") > $time) {
                    session_destroy();
                    $responses['status'] = ICommons::HTTP_408;
                    $this->resultado = ICommons::HTTP_408_MSG;
                    $this->mensaje = ICommons::INVALID_TIME;
                    $responses['mensaje'] = $this;
                }else{
                    $responses['api_key'] = true;
                    $_SESSION["time"] = date("H:i:s",strtotime('+60 minutes'));
                }
            }else{
                $responses['status'] = ICommons::HTTP_401;
                $this->resultado = ICommons::HTTP_401_MSG;
                $this->mensaje = ICommons::HEADER_INVALID_AUTH_HEADERS;
                $responses['mensaje'] = $this;
            }            
        }else{
            $responses['status'] = ICommons::HTTP_401;
            $this->resultado = ICommons::HTTP_401_MSG;
            $this->mensaje = ICommons::HEADER_INVALID_AUTH_HEADERS;
            $responses['mensaje'] = $this;
        }

        return $responses;
    }

    public function LoginApiKey($request){
        $key = $request->getHeader(ICommons::HEADER_API_KEY);
        $api_key = "";
        $responses = array();
        
        foreach ($key as $value) {
            $api_key = $value;
        }

        if ($api_key === ICommons::API_KEY) {
            $responses['api_key'] = true;
        }else{
            $responses['status'] = ICommons::HTTP_401;
            $this->resultado = ICommons::HTTP_401_MSG;
            $this->mensaje = ICommons::HEADER_INVALID_AUTH_HEADERS;
            $responses['mensaje'] = $this;
        }

        return $responses;
    }

    public function CreateToken(){
        $token = substr(md5(rand()), 0, 50);

        if ($token) {            
            return $token;
        }
    }
}