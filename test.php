<?php
require_once('include.php');
require('header.php');

if (!$_SESSION['USER_ID'] || !$_SESSION['REGISTRATION_ID']) {
    die('Войдите в лк!');
}

$userId = $_SESSION['USER_ID'];
$variant = intval($_POST['variant']);

$conn = mysqli_connect(HOST, USER, PASSWORD);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn, 'kerosinkaDB');

$sqlGetInfo = "
    select t.user_id
    from USER_TESTS t
    where t.user_id = {$userId};
";
$rawGetInfo = mysqli_query($conn, $sqlGetInfo);
if ($rawGetInfo->num_rows) {
    die('Вы уже проходили тестирование. На эту страницу Вы зайти более не сможете!');
}
$userInfo = mysqli_fetch_array($rawGetInfo, MYSQLI_ASSOC);

$sqlFirstInsert = "
    insert into USER_TESTS
        (user_id)
    values
        ({$userId});
";
mysqli_query($conn, $sqlFirstInsert);

$header = "
    <!DOCTYPE html>
    <html lang=\"en\">
    <!-- by Sadykov Kamil (Kamil.sadykov@mail.ru) -->
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Онлайн этап олимпиады</title>
    " . $header;

$mainPage = file_get_contents((__DIR__) . '/tests/test' . $variant . '.html');
$footer = file_get_contents((__DIR__) . '/footer.php');

echo $header . $mainPage . $footer;
