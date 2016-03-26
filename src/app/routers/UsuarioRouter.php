<?php

use App\Controllers\UsuarioController;
use App\Config\Response;
use App\Config\ICommons; 

$app->group('/usuarios', function () {
    
    $usuario = new UsuarioController();
    $token = new Response();

    $this->get('/', function ($request, $response, $args) use ($usuario,$token){
        $resp = $token->Token($request);
        if ($resp['token'] === true) {
            $resp = $usuario->Get();
        }
        return $response->withStatus($resp['status'])->withJson($resp['mensaje']);
    });

    $this->get('/{id}', function ($request, $response, $args) use ($usuario,$token){
        $resp = $token->Token($request);
        if ($resp['token'] === true) {
            $resp = $usuario->BuscarPorId($args['id']);
        }
        return $response->withStatus($resp['status'])->withJson($resp['mensaje']);
    });

    $this->get('/filtrar/', function ($request, $response, $args) use ($usuario,$token){
        $resp = $token->Token($request);
        if ($resp['token'] === true) {
            $resp = $usuario->BuscarPorLike($request);
        }
        return $response->withStatus($resp['status'])->withJson($resp['mensaje']);
    });

    $this->get('/listar/', function ($request, $response, $args) use ($usuario,$token){
        $resp = $token->Token($request);
        if ($resp['token'] === true) {
            $resp = $usuario->Listar($request);
        }        
        return $response->withStatus($resp['status'])->withJson($resp['mensaje']);
    });

    $this->post('/', function ($request, $response, $args) use ($usuario,$token){
        $resp = $token->Token($request);
        if ($resp['token'] === true) {
            $resp = $usuario->Registrar($request->getParsedBody());
        }
        return $response->withStatus($resp['status'])->withJson($resp['mensaje']);
    });

    $this->put('/{id}', function ($request, $response, $args) use ($usuario,$token){
        $resp = $token->Token($request);
        if ($resp['token'] === true) {
            $resp = $usuario->Actualizar($args['id'],$request->getParsedBody());
        }        
        return $response->withStatus($resp['status'])->withJson($resp['mensaje']);
    });

    $this->delete('/{id}', function ($request, $response, $args) use ($usuario,$token){
        $resp = $token->Token($request);
        if ($resp['token'] === true) {
            $resp = $usuario->Eliminar($args['id']);
        }        
        return $response->withStatus($resp['status'])->withJson($resp['mensaje']);
    });
    
});
