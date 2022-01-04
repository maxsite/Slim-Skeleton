<?php

/**
 * Пример Middleware
 */

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;

class AfterMiddleware
{
    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler): Response
    {
        $response = $handler->handle($request);
        $response->getBody()->write('AFTER');

        return $response;
    }
}

# end of file
