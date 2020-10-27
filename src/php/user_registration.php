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
$apartment = $apartment ? $apartment : 0;
$password = generateRandomPassword(8);
$variant = rand(1, 4);

$conn = mysqli_connect(HOST, USER, PASSWORD);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn, 'kerosinkaDB');

$sqlCheckExistence = "
    select * 
    from USER_REGISTER
    where email = lower('{$email}')
    and password = '{$password}';
";
$rawResultChecking = mysqli_query($conn, $sqlCheckExistence);
if ($rawResultChecking->num_rows) {
    mysqli_close($conn);
    die('Вы уже зарегистрированы, войдите через соответствующую форму!');
}

$sqlInsertRegister = "
    insert into USER_REGISTER
        (password, email, variant)
    values
        ('{$password}', '{$email}', {$variant}); 
";
mysqli_query($conn, $sqlInsertRegister);

$sqlGetRegistrationId = "
    select id 
    from USER_REGISTER
    where email = '{$email}' and password = '{$password}';
";
$rawRegistrationId = mysqli_query($conn, $sqlGetRegistrationId);
$registrationId = mysqli_fetch_array($rawRegistrationId, MYSQLI_ASSOC)['id'];

$sqlInsertInfo = "
    insert into USER_INFO
        (lastname, firstname, patronymic, sex, birthdate, region_id, edu_city, class_number, edu_name, edu_address, phone, post_index, city, street, house, apartment, reg_id)
    values
        ('{$lastname}', '{$firstname}', '{$patronymic}', '{$sex}', str_to_date('{$birthdate}', '%d.%m.%Y'), {$region_id}, '{$educity}', {$class_number}, '{$edu_name}', '{$edu_address}', '{$phone}', {$post_index}, '{$city}', '{$street}', {$house}, {$apartment}, {$registrationId});
";
mysqli_query($conn, $sqlInsertInfo);

$sqlGetUserId = "
    select user_id 
    from USER_INFO
    where reg_id = {$registrationId};
";
$rawUserId = mysqli_query($conn, $sqlGetUserId);
$userId = mysqli_fetch_array($rawUserId, MYSQLI_ASSOC)['user_id'];

$sqlRegisterSetUserId = "
    update USER_REGISTER
    set user_id = {$userId}
    where email = '{$email}' and password = '{$password}';
";
mysqli_query($conn, $sqlRegisterSetUserId);

mysqli_close($conn);

session_start();
$_SESSION['USER_ID'] = intval($userId);
$_SESSION['REGISTRATION_ID'] = intval($registrationId);

header('Location: ./../../profile.php');

function generateRandomPassword($desiredLength) {
    $password = '';

    for($length = 0; $length < $desiredLength; $length++) {
        $password .= chr(rand(32, 126));
    }

    return $password;
}
