<?php

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
            makeFailure('Неправильные параметры запроса');
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

/**
 * Ответ клиенту с сообщением об ошибке.
 * Используется при работе с Ajax запросами (Ext.data.Store,Ext.Ajax,Ext.form.Basic)
 * @param  string $msg Сообщение об ошибке
 * @return null
 */
function makeFailure($msg)
{
    die(json_encode(['success' => false, 'msg' => $msg]));
}

/**
 * Ответ клиенту с сообщением об успешном выполнении.
 * Используется при работе с Ajax запросами (Ext.Ajax,Ext.form.Basic)
 * @param  string $msg Сообщение
 * @return null
 */
function makeSuccess($msg)
{
    die(json_encode(['success' => true, 'msg' => $msg]));
}

