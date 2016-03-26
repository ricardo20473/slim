<?php

use App\Controllers\SecurityController;
use App\Config\Response;

$security = new SecurityController();
$api = new Response();

$app->post('/security/access_token', function ($request, $response, $args) use ($security,$api){
    
    $resp = $api->LoginApiKey($request);
    if ($resp['api_key'] === true) {
        $resp = $security->Token($request->getParsedBody());
    }
    return $response->withStatus($resp['status'])->withJson($resp['mensaje']);
});