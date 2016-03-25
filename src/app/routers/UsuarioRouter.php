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

    $this->get('/filtrar/', function ($request, $response, $args) use ($usuario){
        $resp = $usuario->BuscarPorLike($request);
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

    $this->post('/', function ($request, $response, $args) use ($usuario){
        $resp = $usuario->Registrar($request->getParsedBody());
        return $response->withHeader($resp['header'])
                        ->withStatus($resp['status'])
                        ->withJson($resp['mensaje']);
    });

    $this->put('/{id}', function ($request, $response, $args) use ($usuario){
        $resp = $usuario->Actualizar($args['id'],$request->getParsedBody());
        return $response->withHeader($resp['header'])
                        ->withStatus($resp['status'])
                        ->withJson($resp['mensaje']);
    });

    $this->delete('/{id}', function ($request, $response, $args) use ($usuario){
        $resp = $usuario->Eliminar($args['id']);
        return $response->withHeader($resp['header'])
                        ->withStatus($resp['status'])
                        ->withJson($resp['mensaje']);
    });
    
});
