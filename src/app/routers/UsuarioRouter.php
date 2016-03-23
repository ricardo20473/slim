<?php

use App\Controllers\UsuarioController;

$app->group('/usuarios', function () {
    
    $usuario = new UsuarioController();

    $this->get('/', function ($request, $response, $args) use ($usuario){
        return $response->withJson($usuario->Listar($response));
    });
    
});
