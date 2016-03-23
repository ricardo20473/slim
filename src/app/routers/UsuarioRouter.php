<?php

use App\Controllers\UsuarioController;

$app->group('/usuarios', function () {
    
    $usuario = new UsuarioController();

    $this->get('/', function ($request, $response, $args) use ($usuario){
        return $response->withJson($usuario->Get($response));
    });

    $this->get('/{id}', function ($request, $response, $args) use ($usuario){
        return $response->withJson($usuario->BuscarPorId($args['id'],$response));
    });

    $this->get('/filtrar/{like}', function ($request, $response, $args) use ($usuario){
        $this->logger->debug($args['like']);
        return $response->withJson($usuario->BuscarPorLike($args['like'],$response));
    });

    $this->get('/listar/{filtrar}', function ($request, $response, $args) use ($usuario){
        $this->logger->debug('listar: '.$args['filtrar']);
        return $response->withJson($usuario->Listar($args['filtrar'],$response));
    });
    
});
