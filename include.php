<?php

const HOST = 'localhost';
const USER = 'andrew';
const PASSWORD = 'dolphin';

/**
 * Функция для проверки присланных в php-файл параметров
 *
 * @param $src
 * @param array $required_params
 * @param array $optional_params
 * @return array
 */
function checkAndPrepareParams($src, $required_params = [], $optional_params = [])
{
    $vars = [];
    /** Если в required_params нет хотя-бы одного присланного параметра(точнее - его ключа),
     *  выдаёт ошибку
     */
    foreach ($required_params as $value) {
        if (!array_key_exists($value, $src)) {
            die('Неправильные параметры запроса');
        }
        $vars[$value] = $src[$value];
    }
    foreach ($optional_params as $value) {
        if (array_key_exists($value, $src)) {
            $vars[$value] = $src[$value];
        } else {
            $vars[$value] = null;
        }
    }
    return $vars;
}

