<?php
$base = __DIR__ . '/../app/';

$folders = [
    'controllers',
    'libs',
    'models',
    'routers',
];

foreach($folders as $f)
{
    foreach (glob($base . "$f/*.php") as $k => $filename)
    {
        require $filename;
    }
}