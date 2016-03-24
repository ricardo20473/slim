<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Config\Response;
use App\Config\ICommons; 

class UsuarioController 
{   
    public function __CONSTRUCT()
    {
        $this->usuario = new Usuario();
        $this->response = new Response();
    }
    
    public function Get(){
        
        if ($this->usuario) {
            
            $get = $this->usuario->Get();

            return $this->response->setResponse($get);
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }            
    }

    public function BuscarPorId($id){
        
        if ($this->usuario) {

            $filtrarId = $this->usuario->BuscarPorId($id);

            return $this->response->setResponse($filtrarId);
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }            
    }

    public function BuscarPorLike($like){
        
        if ($this->usuario) {

            $like = $this->usuario->BuscarPorLike($like);

            return $this->response->setResponse($like);
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }            
    }

    public function Listar($request){
        
        if ($this->usuario) {
            
            $filter = array();
            $nombre = $request->getParam('nombre');
            $apellido = $request->getParam('apellido');
            $usuario = $request->getParam('usuario');
            $email = $request->getParam('email');

            if($nombre){
                if (!empty($nombre)) {
                    $filter["nombre"] = $nombre;
                }else{
                    return ICommons::INVALID_FILTER . ". Nombre: " .$nombre;
                }
            }

            if ($apellido) {
                if(!empty($apellido)){
                    $filter["apellido"] = $apellido;
                }else{
                    return ICommons::INVALID_FILTER . ". Apellido: " .$apellido;
                }
            }
            
            if ($usuario) {
                if(!empty($usuario)){
                    $filter["usuario"] = $usuario;
                }else{
                    return ICommons::INVALID_FILTER . ". Usuario: " .$usuario;
                }
            }
            

            if ($email) {
                if(!empty($email)){
                    $filter["email"] = $email;
                }else{
                    return ICommons::INVALID_FILTER . ". Email: " .$email;
                }
            }
            
            $filtrar = $this->usuario->Listar($filter);
            
            return $this->response->setResponse($filtrar);
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }            
    }

    public function Registrar(){
        
    }
}