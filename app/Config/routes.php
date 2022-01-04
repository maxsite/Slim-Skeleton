<?php

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

// http://demo/slim2/
$app->get('/', \App\Modules\Home\Home::class); // класс с __invoke
// $app->get('/', '\App\Modules\Home\Home:home'); // или через метод home

// http://demo/slim2/hello
$app->get('/hello', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $response->getBody()->write('Hello world!');
    return $response;
});

/*
// все остальные 404-адреса http://demo/slim2/news
$app->get('/{slug}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $response->getBody()->write('This page is ' . $args['slug']);
    return $response;
}); 
*/

# end of file
