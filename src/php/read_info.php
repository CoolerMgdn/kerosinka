<?php
require_once('./../../include.php');

$userId = intval($_POST['userId']);

$conn = mysqli_connect(HOST, USER, PASSWORD);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn, 'kerosinkaDB');

$sqlGetInfo = "
    select i.lastname, i.firstname, i.patronymic, i.sex, date_format(i.birthdate, '%d.%m.%Y') as birthdate, i.city, 
        i.edu_city, edu_address, i.edu_name, i.class_number, i.region_id, i.phone, i.post_index, r.email, i.city, 
        i.street, i.house, i.apartment, r.CASE_NUMBER as variant 
    from USER_INFO i
    join USER_REGISTER r
        on r.user_id = i.user_id
    where i.user_id = {$userId};
";
$rawGetInfo = mysqli_query($conn, $sqlGetInfo);
$userInfo = mysqli_fetch_array($rawGetInfo, MYSQLI_ASSOC);

$sqlGetTasks = "
    select 
        t.task_1, t.task_2, t.task_3, t.task_4, t.task_5, t.task_6, t.task_7, t.task_8, t.task_9, t.task_10, t.task_11, 
        t.task_12, t.task_13, t.task_14, t.task_15, t.task_16, t.task_17, t.task_18, t.task_19, t.task_20, t.task_21, t.task_22 
    from USER_INFO i
    join USER_TESTS t
        on t.user_id = i.user_id
    where i.user_id = {$userId};
";
$rawGetTasks = mysqli_query($conn, $sqlGetTasks);
$userTasks = mysqli_fetch_array($rawGetTasks, MYSQLI_ASSOC);

$userVariant = intval($userInfo['variant']);
$variantName = 'variant_' . $userVariant;
foreach ($userTasks as $key => $task) {
    $numKey = intval(substr($key, strpos($key, '_') + 1));
    if ($numKey < 16) {
        $values = str_split($task);
        foreach ($values as $index => $value) {
            $variant = $$variantName;
            switch ($variant[$numKey]) {
                case IS_ENGLISH:
                    $values[$index] = $numbersCharsEng[$value];
                    break;
                case IS_RUSSIAN:
                    $values[$index] = $numbersCharsRus[$value];
            }
        }
        $valuesTask = implode(', ', $values);
        $userTasks[$key] = $valuesTask;
    }
}

mysqli_close($conn);

session_start();
$_SESSION['userInfo'] = $userInfo;
$_SESSION['userTasks'] = $userTasks;

header('Location: ./../../admin.php');
