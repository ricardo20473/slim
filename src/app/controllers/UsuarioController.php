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

    public function BuscarPorLike($request){
        
        if ($this->usuario) {

            $filter = array();
            $nombre = $request->getParam('nombre');
            $apellido = $request->getParam('apellido');
            $usuario = $request->getParam('usuario');
            $email = $request->getParam('email');

            if($nombre){
                $filter["nombre"] = $nombre;
            }

            if ($apellido) {
                $filter["apellido"] = $apellido;
            }
            
            if ($usuario) {
                $filter["usuario"] = $usuario;
            }
            

            if ($email) {
                $filter["email"] = $email;
            }

            $like = $this->usuario->BuscarPorLike($filter);

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

    public function Registrar($data){
        if ($this->usuario) {
            
            $registrar = $this->usuario->Registrar($data);

            $buscarPorId = $this->usuario->BuscarPorId($registrar);

            return $this->response->setResponse($buscarPorId);
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }
    }

    public function Actualizar($id,$data){
        if ($this->usuario) {
            
            $actualizar = $this->usuario->Actualizar($id,$data);

            $buscarPorId = $this->usuario->BuscarPorId($actualizar);

            return $this->response->setResponse($buscarPorId);
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }
    }

    public function Eliminar($id){
        if ($this->usuario) {
            
            $eliminar = $this->usuario->Eliminar($id);

            return $this->response->setResponse($eliminar);
        }else{
            return  ICommons::UNEXPECTED_ERROR;
        }
    }
}