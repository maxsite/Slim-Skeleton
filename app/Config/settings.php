<?php

// alias => файл конфигурации
$files = [
    'app' => 'app.php',
    'db' => 'db.php',
];

// сохраняем в контейнере
$container->set('config', function () use ($files) {
    return new \Lib\Settings\Settings($files);
});

/*
// проверка
$confApp = $container->get('config')->getAlias('app');
pr($confApp);
*/

# end of file