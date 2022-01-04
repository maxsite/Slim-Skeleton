<?php

/**
 * Пример Middleware
 */

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;
use Psr\Container\ContainerInterface;

class BeforeMiddleware
{
    // если нужен контейнер
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler): Response
    {
        $response = $handler->handle($request);
        $existingContent = (string) $response->getBody();

        $response = new Response();
        $response->getBody()->write('BEFORE' . $existingContent);

        return $response;
    }
}

# end of file
