<?php

/**
 * Debug functions
 * 
 * \Lib\Debug\Pr::out($a);
 * 
 */

namespace Lib\Debug;

class Pr
{
    /**
     * Функция для отладки из MaxSite CMS
     * @param $var - переменная для вывода
     * @param $html - обработать как HTML
     * @param $echo - вывод в браузер
     */
    public static function out($var, $html = true, $echo = true)
    {
        if (!$echo)
            ob_start();
        else
            echo '<pre style="padding: 10px; margin: 10px; background: #455052; color: #D5EAED; white-space: pre-wrap; font-size: 10pt; max-height: 600px; font-family: Consolas, mono; line-height: 1.3; overflow: auto;">';

        if (is_bool($var)) {
            if ($var)
                echo 'TRUE';
            else
                echo 'FALSE';
        } else {
            if (is_scalar($var)) {
                if (!$html) {
                    echo $var;
                } else {
                    $var = str_replace('<br />', "<br>", $var);
                    $var = str_replace('<br>', "<br>\n", $var);
                    $var = str_replace('</p>', "</p>\n", $var);
                    $var = str_replace('<ul>', "\n<ul>", $var);
                    $var = str_replace('<li>', "\n<li>", $var);
                    $var = htmlspecialchars($var, ENT_QUOTES);
                    $var = wordwrap($var, 300);

                    echo $var;
                }
            } else {
                if (!$html) {
                    print_r($var);
                } else {
                    echo htmlspecialchars(print_r($var, true), ENT_QUOTES);
                }
            }
        }

        if (!$echo) {
            $out = ob_get_contents();
            ob_end_clean();
            return $out;
        } else {
            echo '</pre>';
        }
    }
}

# end of file
