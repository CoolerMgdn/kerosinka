<?php
require_once('./../../include.php');
session_start();

if (!$_SESSION['USER_ID'] || !$_SESSION['REGISTRATION_ID']) {
    die('Войдите в лк!');
}
$userId = $_SESSION['USER_ID'];

$answers = $_POST['tests'];

/** Преобразование к числам (для записи в бд) */
foreach ($answers as $i => $answer) {
    if (is_array($answer)) {
        if (in_array($answer[0], $numbersCharsEng)) {
            foreach ($answer as $index => $item) {
                $answer[$index] = array_search($item, $numbersCharsEng);
            }
        } else if (in_array($answer[0], $numbersCharsRus)) {
            foreach ($answer as $index => $item) {
                $answer[$index] = array_search($item, $numbersCharsRus);
            }
        }

        $tempAnswer = '';
        foreach ($answer as $index => $item) {
            $tempAnswer .= $item;
        }
        $answers[$i] = $tempAnswer;
    }

    if (empty($answer)) {
        $answers[$i] = 'null';
    }
}

$conn = mysqli_connect(HOST, USER, PASSWORD);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn, 'kerosinkaDB');

$sqlInsertTests = "
    update USER_TESTS
        task_1 = {$answers[0]}, 
        task_2 = {$answers[1]}, 
        task_3 = {$answers[2]}, 
        task_4 = {$answers[3]}, 
        task_5 = {$answers[4]}, 
        task_6 = {$answers[5]}, 
        task_7 = {$answers[6]}, 
        task_8 = {$answers[7]}, 
        task_9 = {$answers[8]}, 
        task_10 = {$answers[9]}, 
        task_11 = {$answers[10]}, 
        task_12 = {$answers[11]}, 
        task_13 = {$answers[12]}, 
        task_14 = {$answers[13]}, 
        task_15 = {$answers[14]}, 
        task_16 = '{$answers[15]}', 
        task_17 = '{$answers[16]}', 
        task_18 = '{$answers[17]}', 
        task_19 = '{$answers[18]}', 
        task_20 = '{$answers[19]}', 
        task_21 = '{$answers[20]}', 
        task_22 = '{$answers[21]}'
    where user_id = {$userId}; 
";
mysqli_query($conn, $sqlInsertTests);

mysqli_close($conn);

header('Location: ./../../profile.php');
