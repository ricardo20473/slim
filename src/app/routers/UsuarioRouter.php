<?php

use App\Controllers\UsuarioController;

$app->group('/usuarios', function () {
    
    $usuario = new UsuarioController();

    $this->get('/', function ($request, $response, $args) use ($usuario){
        $resp = $usuario->Get();
        return $response->withHeader($resp['header'])
                        ->withStatus($resp['status'])
                        ->withJson($resp['mensaje']);
    });

    $this->get('/{id}', function ($request, $response, $args) use ($usuario){
        $resp = $usuario->BuscarPorId($args['id']);
        return $response->withHeader($resp['header'])
                        ->withStatus($resp['status'])
                        ->withJson($resp['mensaje']);
    });

    $this->get('/filtrar/{like}', function ($request, $response, $args) use ($usuario){
        $resp = $usuario->BuscarPorLike($args['like']);
        return $response->withHeader($resp['header'])
                        ->withStatus($resp['status'])
                        ->withJson($resp['mensaje']);
    });

    $this->get('/listar/', function ($request, $response, $args) use ($usuario){
        $resp = $usuario->Listar($request);
        return $response->withHeader($resp['header'])
                        ->withStatus($resp['status'])
                        ->withJson($resp['mensaje']);
    });
    
});
