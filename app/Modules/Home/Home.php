<?php

/**
 * Вывод главной страницы
 */

namespace App\Modules\Home;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Container\ContainerInterface;

class Home
{
    private $container;

    // если нужен контейнер
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

     
    /*  
    // $app->get('/', '\App\Modules\Home\Home:home');
    public function home(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // простой шаблонизатор
        $data = ['name' => 'Вася'];
        $body = getTmpl(__DIR__ . '/home.template.php', $data);

        // формируем ответ
        $response->getBody()->write($body);

        return $response;
    } 
    */
    
    // $app->get('/', \App\Modules\Home\Home::class);
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // простой шаблонизатор
        $data = ['name' => 'Вася'];
        $body = getTmpl(__DIR__ . '/home.template.php', $data);

        // формируем ответ
        $response->getBody()->write($body);

        // 

        return $response;
    }
}

# end of file
