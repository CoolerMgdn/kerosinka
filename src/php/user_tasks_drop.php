<?php
require_once('./../../include.php');
session_start();

if (!$_SESSION['USER_ID']) {
    die('Ошибка!');
}
$userId = $_SESSION['USER_ID'];

$conn = mysqli_connect(HOST, USER, PASSWORD);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn, 'kerosinkaDB');

$sqlDeleteTests = "
        delete from USER_TESTS 
        where user_id = {$userId}; 
        ";

mysqli_query($conn, $sqlDeleteTests);

$_SESSION['userInfo'] = null;
$_SESSION['userTasks'] = null;
$_SESSION['userId'] = null;

header('Location: ./../../admin.php');
