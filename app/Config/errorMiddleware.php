<?php

use Psr\Http\Message\ServerRequestInterface;

$app->addRoutingMiddleware();

// получаем данные из контейнера
$confApp = $container->get('config')->getAlias('app');

// пошли опции
$customErrorHandler = $confApp['ErrorMiddleware']['customErrorHandler'] ?? true;
$displayErrorDetails = $confApp['ErrorMiddleware']['displayErrorDetails'] ?? false;
$logErrors = $confApp['ErrorMiddleware']['logErrors'] ?? false;
$logErrorDetails = $confApp['ErrorMiddleware']['logErrorDetails'] ?? false;

if ($customErrorHandler) {
    // Define Custom Error Handler
    $customErrorHandler = function (
        ServerRequestInterface $request,
        Throwable $exception
    ) use ($app) {
        return \App\Modules\Page404\Page404::response($app, $exception, $request);
    };

    // Add Error Middleware
    if ($container->has('logger'))
        $errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, $logErrors, $logErrorDetails, $container->get('logger'));
    else
        $errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, $logErrors, $logErrorDetails);

    $errorMiddleware->setDefaultErrorHandler($customErrorHandler);
} else {
    // Slim вариант вывода ошибок
    if ($container->has('logger'))
        $app->addErrorMiddleware($displayErrorDetails, $logErrors, $logErrorDetails, $container->get('logger'));
    else
        $app->addErrorMiddleware($displayErrorDetails, $logErrors, $logErrorDetails);
}

# end of file
