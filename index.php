<?php

//incluir el archivo principal
include("Slim/Slim.php");

//registran la instancia de slim
\Slim\Slim::registerAutoloader();

//aplicacion 
$app = new \Slim\Slim();

//Agregando todo el contenido de la carpeta app
require 'app/app_loader.php';

//inicializamos la aplicacion(API)
$app->run();

