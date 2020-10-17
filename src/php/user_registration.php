<?php
require_once('./../../include.php');

extract(checkAndPrepareParams(
    $_POST,
    [
        'lastname',
        'firstname',
        'patronymic',
        'sex',
        'birthdate',
        'region_id',
        'edu_city',
        'class_number',
        'edu_name',
        'edu_address',
        'email',
        'phone',
        'post_index',
        'city',
        'street',
        'house',
        'apartment'
    ]
));

var_dump($_POST);
die();
