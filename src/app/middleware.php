<?php

use App\Config\ICommons; 

// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

// $app->add(new \Slim\Middleware\JwtAuthentication([
//     "secure" => false,
//     "secret" => "1234",
//     "callback" => function ($options) use ($app) {
//         $app->jwt = $options["decoded"];
//     },
//     "error" => function ($request, $response, $arguments) {
//         return $response->write(ICommons::HEADER_INVALID_AUTH_HEADERS);
//     }
// ]));

// $app->add(new \Slim\Middleware\HttpBasicAuthentication([
//     "users" => [
//         "root" => "root",
//         "user" => "1234"
//     ]
// ]));