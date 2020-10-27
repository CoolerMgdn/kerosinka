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
    insert into USER_TESTS
        (user_id, task_1, task_2, task_3, task_4, task_5, task_6, task_7, task_8, task_9, task_10,
         task_11, task_12, task_13, task_14, task_15, task_16, task_17, task_18, task_19, task_20, task_21, task_22)
    values
        ({$userId}, {$answers[0]}, {$answers[1]}, {$answers[2]}, {$answers[3]}, {$answers[4]}, {$answers[5]}, 
        {$answers[6]}, {$answers[7]}, {$answers[8]}, {$answers[9]}, {$answers[10]}, {$answers[11]}, {$answers[12]}, 
        {$answers[13]}, {$answers[14]}, '{$answers[15]}', '{$answers[16]}', '{$answers[17]}', '{$answers[18]}', '{$answers[19]}', 
        '{$answers[20]}', '{$answers[21]}'); 
";
mysqli_query($conn, $sqlInsertTests);

mysqli_close($conn);

header('Location: ./../../profile.php');
