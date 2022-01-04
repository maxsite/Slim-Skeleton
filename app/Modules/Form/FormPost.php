<?php

/**
 * Получение post от формы
 */

namespace App\Modules\Form;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class FormPost
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // получить данные из формы
        $parsedBody = $request->getParsedBody();

        $file = findFileViews('Modules/Form', 'message.template.php');

        $message = getTmpl($file, [
            'name' => $parsedBody['name'],
            'email' => $parsedBody['email'],
        ]);

        $file = findFileViews('Modules/Form', 'show.template.php');
        $body = getTmpl($file, ['message' => $message]);

        $response->getBody()->write($body);

        return $response;
    }
}

# end of file
