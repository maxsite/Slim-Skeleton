<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**
 * framework functions
 */

/**
 * wrapper function \Lib\Debug\Pr::out()
 */
function pr($var, $html = true, $echo = true)
{
    \Lib\Debug\Pr::out($var, $html, $echo);
}

/**
 * Простой шаблонизатор
 */
function getTmpl(string $_file, $data = [])
{
    $out = '';

    if (file_exists($_file)) {
        extract($data);
        ob_start();
        require $_file;
        $out = ob_get_contents(); // получаем данные из буфера

        if (ob_get_length()) ob_end_clean(); // очистили буфер
    }

    return $out;
}

/**
 * Поиск файла в каталоге resources/views или app 
 */
function findFileViews(string $dir, string $file)
{
    if (file_exists(BASE_DIR . 'resources/views/' . $dir . '/' . $file))
        $resultFile = BASE_DIR . 'resources/views/' . $dir . '/' . $file;
    else
        $resultFile = BASE_DIR . 'app/' . $dir . '/' . $file;

    return $resultFile;
}

# end of file
