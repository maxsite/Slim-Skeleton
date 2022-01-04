<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Создадим объект для логирования через контейнер
// https://github.com/Seldaek/monolog
$container->set('logger', function () {
    $log = new Logger('general');
    $log->pushHandler(new StreamHandler(BASE_DIR . 'var/log/app.log', Logger::INFO));

    return $log;
});

# end of file
