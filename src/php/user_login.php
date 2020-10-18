<?php
require_once('./../../include.php');

extract(checkAndPrepareParams(
    $_POST,
    [
        'email',
        'password'
    ]
));

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
$rawUserResult = mysqli_query($conn, $sqlCheckExistence);
if (!$rawUserResult->num_rows) {
    mysqli_close($conn);
    die('Вы ещё не зарегистрировались!');
}
$userResult = mysqli_fetch_array($rawUserResult, MYSQLI_ASSOC);

$sqlUpdateAttendance = "
    update USER_REGISTER
    set attend_count = ifnull(attend_count, 0) + 1,
        attend_data = now()
    where email = '{$email}' and password = '{$password}';
";
mysqli_query($conn, $sqlUpdateAttendance);

session_start();
$_SESSION['USER_ID'] = intval($userResult['USER_ID']);
$_SESSION['REGISTRATION_ID'] = intval($userResult['ID']);

mysqli_close($conn);

header('Location: ./../../profile.php');
