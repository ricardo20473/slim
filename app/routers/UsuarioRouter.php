<?php

use App\Controllers\UsuarioController;

$app->group('/usuarios/', function () use ($app) {
    
    $usuario = new UsuarioController();

    $app->get('listar',function() use ($app,$usuario){

        $app->response->body($usuario->Listar($app));
        
    });

    $app->get('filtrar/:id',function($id) use ($app,$usuario){

        $app->response->body($usuario->findByPK($id,$app));
        
    });

    $app->post('registrar',function() use ($app,$usuario){

        $app->response->body($usuario->registrar($app));
        
    });

    $app->put('modificar/:id',function($id) use ($app,$usuario){

        $app->response->body($usuario->modificar($id,$app));
        
    });

    $app->delete('eliminar/:id',function($id) use ($app,$usuario){

        $app->response->body($usuario->eliminar($id,$app));
        
    });
});
