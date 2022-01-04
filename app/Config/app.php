<?php
/**
 * Config App
 */

return [
    'ErrorMiddleware' => [
        'customErrorHandler' => true, // свой обработчик errorMiddleware
        'displayErrorDetails' => false, // выводить детали ошибки
        'logErrors' => false, // писать в лог
        'logErrorDetails' => false, // детали в лог
    ],
    
];