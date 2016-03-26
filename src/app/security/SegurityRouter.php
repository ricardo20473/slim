<?php

use App\Controllers\SecurityController;


    
$security = new SecurityController();

$app->get('/security',function ($request, $response, $args) {
    $valor = $request->getHeader('api-key');


    if ($request->getHeader('api-key') == array('abc1234')) {
        return $response->withJson($valor);
    }else{
        return $response->getBody()->write("Error: api key incorrecto");
    }
    // return $response->withJson($valor);
    
});

$app->post('/security/access_token', function ($request, $response, $args) use ($security){
    
    // $resp = $security->Token($request->getParsedBody());
    
    // return $response->withStatus($resp['status'])->withJson($resp['mensaje']);
});

    

