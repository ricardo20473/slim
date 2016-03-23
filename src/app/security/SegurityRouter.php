<?php

use App\Controllers\SecurityController;

$app->group('/security', function () {
    
    $security = new SecurityController();

    $this->post('/access_token', function ($request, $response, $args) use ($security){
        return $response->withJson($security->Token($response));
    });
});
