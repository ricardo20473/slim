<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    
    $this->logger->info("Slim API REST '/' route");
    return $response->write("Bienvenidos a Slim API REST ");

});

$app->get('/api',function ($req, $res, $args) {

});