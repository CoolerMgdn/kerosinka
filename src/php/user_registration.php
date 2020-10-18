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
$sex = $sex == 'Муж' ? 'M' : 'F';
$password = generateRandomPassword(8);

$conn = mysqli_connect('localhost', 'andrew', 'dolphin');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn, 'kerosinkaDB');

$sql = "
    insert into USER_REGISTER
        (password, email)
    values
        ('{$password}', '{$email}'); 
";
mysqli_query($conn, $sql);

$sql = "
    select id 
    from USER_REGISTER
    where email = '{$email}' and password = '{$password}';
";
$rawRegId = mysqli_query($conn, $sql);
$regId = mysqli_fetch_array($rawRegId, MYSQLI_ASSOC)['id'];

$sql = "
    insert into USER_INFO
        (lastname, firstname, patronymic, sex, birthdate, region_id, edu_city, class_number, edu_name, edu_address, phone, post_index, city, street, house, apartment, reg_id)
    values
        ('{$lastname}', '{$firstname}', '{$patronymic}', '{$sex}', str_to_date('{$birthdate}', '%d.%m.%Y'), {$region_id}, '{$educity}', {$class_number}, '{$edu_name}', '{$edu_address}', '{$phone}', {$post_index}, '{$city}', '{$street}', {$house}, {$apartment}, {$regId});
";
mysqli_query($conn, $sql);

$sql = "
    select user_id 
    from USER_INFO
    where reg_id = {$regId};
";
$rawUserId = mysqli_query($conn, $sql);
$userId = mysqli_fetch_array($rawUserId, MYSQLI_ASSOC)['user_id'];

$sql = "
    update USER_REGISTER
    set user_id = {$userId}
    where email = '{$email}' and password = '{$password}';
";
mysqli_query($conn, $sql);

mysqli_close($conn);

function generateRandomPassword($desired_length) {
    $password = '';

    for($length = 0; $length < $desired_length; $length++) {
        $password .= chr(rand(32, 126));
    }

    return $password;
}
