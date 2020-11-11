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

    if (!empty($answer)) {
        $index = $i + 1;
        $delimiter = $index > 1 ? ', ' : '';
        if ($index < 16) {
            $answers[$i] = $delimiter . 'task_' . $index . ' = ' . $answers[$i];
        } else {
            $answers[$i] = $delimiter . 'task_' . $index . ' = \'' . $answers[$i] . '\'';
        }
    }
}

$conn = mysqli_connect(HOST, USER, PASSWORD);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn, 'kerosinkaDB');

if (!empty($answers)) {
    $sqlInsertTests = "
        update USER_TESTS set 
            {$answers[0]}
            {$answers[1]}
            {$answers[2]}
            {$answers[3]}
            {$answers[4]}
            {$answers[5]}
            {$answers[6]}
            {$answers[7]}
            {$answers[8]}
            {$answers[9]}
            {$answers[10]}
            {$answers[11]}
            {$answers[12]}
            {$answers[13]}
            {$answers[14]}
            {$answers[15]}            
            {$answers[16]} 
            {$answers[17]}
            {$answers[18]}
            {$answers[19]}
            {$answers[20]}
            {$answers[21]}
        where user_id = {$userId}; 
        ";

    mysqli_query($conn, $sqlInsertTests);
}

mysqli_close($conn);

header('Location: ./../../profile.php');
