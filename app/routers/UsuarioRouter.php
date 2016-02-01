<?php

use App\Controllers\UsuarioController;

$app->group('/usuarios/', function () use ($app) {
    
    $usuario = new UsuarioController();

    $app->get('listar',function() use ($app,$usuario){

        $app->response->headers->set("Content-type", "application/json");
        $app->response->status(200);
        $app->response->body($usuario->Listar());
        
    });
});
