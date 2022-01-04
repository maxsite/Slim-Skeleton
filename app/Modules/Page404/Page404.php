<?php

/**
 * Модуль, коорый отвечает за вывод 404-ошибки
 */

namespace App\Modules\Page404;

use Psr\Http\Message\ServerRequestInterface;
use Fig\Http\Message\StatusCodeInterface;

class Page404
{
    public static function response($app, \Throwable $exception, ServerRequestInterface $request)
    {
        $container = $app->getContainer();

        // если установлен лог, то пишем в него сообщение об ошибке
        if ($container->has('logger'))
            $container->get('logger')->error('404', [$exception->getMessage()]);

        // простой шаблонизатор
        $body = getTmpl(__DIR__ . '/404.template.php');

        // формируем ответ
        // указываем http-код ошибки 404
        $response = $app->getResponseFactory()->createResponse(StatusCodeInterface::STATUS_NOT_FOUND);

        $response->getBody()->write($body);

        // pr($request->getUri());
        return $response;
    }
}

# end of file
