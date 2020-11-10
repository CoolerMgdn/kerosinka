<?php

const HOST = 'localhost';
const USER = 'andrew';
const PASSWORD = 'dolphin';

const IS_NUMERAL = 0;
const IS_ENGLISH = 1;
const IS_RUSSIAN = 2;

$numbersCharsEng = [
    1 => 'A',
    2 => 'B',
    3 => 'C',
    4 => 'D',
    5 => 'E',
    6 => 'F',
    7 => 'G',
    8 => 'H',
    9 => 'I',
    10 => 'J'
];

$numbersCharsRus = [
    1 => 'А',
    2 => 'Б',
    3 => 'В',
    4 => 'Г',
    5 => 'Д',
    6 => 'Е',
    7 => 'Ж',
    8 => 'З',
    9 => 'И',
    10 => 'К'
];

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

$variant_1 = [
    1 => IS_RUSSIAN,
    2 => IS_RUSSIAN,
    3 => IS_NUMERAL,
    4 => IS_NUMERAL,
    5 => IS_NUMERAL, // ???
    6 => IS_ENGLISH,
    7 => IS_ENGLISH,
    8 => IS_RUSSIAN,
    9 => IS_ENGLISH,
    10 => IS_ENGLISH,
    11 => IS_ENGLISH,
    12 => IS_ENGLISH,
    13 => IS_NUMERAL,
    14 => IS_ENGLISH,
    15 => IS_ENGLISH
];

$variant_2 = [
    1 => IS_RUSSIAN,
    2 => IS_RUSSIAN,
    3 => IS_RUSSIAN,
    4 => IS_ENGLISH,
    5 => IS_NUMERAL,
    6 => IS_ENGLISH,
    7 => IS_ENGLISH,
    8 => IS_ENGLISH,
    9 => IS_ENGLISH,
    10 => IS_ENGLISH,
    11 => IS_ENGLISH,
    12 => IS_ENGLISH,
    13 => IS_NUMERAL,
    14 => IS_ENGLISH,
    15 => IS_ENGLISH
];

$variant_3 = [
    1 => IS_RUSSIAN,
    2 => IS_RUSSIAN,
    3 => IS_RUSSIAN,
    4 => IS_RUSSIAN,
    5 => IS_NUMERAL,
    6 => IS_ENGLISH,
    7 => IS_ENGLISH,
    8 => IS_ENGLISH,
    9 => IS_ENGLISH,
    10 => IS_ENGLISH,
    11 => IS_ENGLISH,
    12 => IS_ENGLISH,
    13 => IS_RUSSIAN,
    14 => IS_ENGLISH,
    15 => IS_ENGLISH
];

$variant_4 = [
    1 => IS_RUSSIAN,
    2 => IS_ENGLISH,
    3 => IS_ENGLISH,
    4 => IS_RUSSIAN,
    5 => IS_NUMERAL,
    6 => IS_ENGLISH,
    7 => IS_ENGLISH,
    8 => IS_ENGLISH,
    9 => IS_ENGLISH,
    10 => IS_ENGLISH,
    11 => IS_ENGLISH,
    12 => IS_NUMERAL,
    13 => IS_ENGLISH,
    14 => IS_ENGLISH,
    15 => IS_ENGLISH
];
