<?php

/**
 * Вывод формы
 */

namespace App\Modules\Form;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class FormShow
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // файл show.template.php может быть либо в каталоге этого модуля,
        // либо в resources/views/Modules/Form
        $file = findFileViews('Modules/Form', 'show.template.php');

        $body = getTmpl($file, ['message' => '']);
        $response->getBody()->write($body);

        return $response;
    }
}

# end of file
