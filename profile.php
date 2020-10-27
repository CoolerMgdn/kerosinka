<?php
require_once('include.php');
require('header.php');

if (!$_SESSION['USER_ID'] || !$_SESSION['REGISTRATION_ID']) {
    die('Войдите в лк!');
}

$userId = $_SESSION['USER_ID'];

$conn = mysqli_connect(HOST, USER, PASSWORD);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn, 'kerosinkaDB');

$sqlGetInfo = "
    select i.lastname, i.firstname, i.patronymic, date_format(i.birthdate, '%d.%m.%Y') as birthdate, i.city, i.edu_name, i.class_number, i.phone, r.email, r.variant
    from USER_INFO i
    join USER_REGISTER r
        on r.user_id = i.user_id
    where i.user_id = {$userId};
";
$rawGetInfo = mysqli_query($conn, $sqlGetInfo);
$userInfo = mysqli_fetch_array($rawGetInfo, MYSQLI_ASSOC);

$classNumber = $userInfo['class_number'] == 0 ? 'Не школьник' : $userInfo['class_number'];

$header = "
    <!DOCTYPE html>
    <html lang=\"en\">
    <!-- by Sadykov Kamil (Kamil.sadykov@mail.ru) -->
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Личный кабинет</title>
    " . $header;

$mainPage = "
    <!-- РГУНГ -->
    <section id=\"section00\"> </section>

    <!-- Личный кабинет -->
    <div class=\"container\">
        <section id=\"sectionlk\">
            <a class=\"about-text\">Личный кабинет</a><br>
            <!-- Контейнер с данными пользователя (grid) -->
            <div class=\"sectionlk-info\">
                <div class=\"sectionlk-info-fio\">
                    <p class=\"about-text2\">
                        <a>" . $userInfo['lastname'] . " " . $userInfo['firstname'] . " " . $userInfo['patronymic'] . "</a> <!-- БЕРЕТСЯ ИЗ БД -->
                    </p>
                </div>
                <div class=\"sectionlk-info-text\">
                    <p class=\"about-text2\">
                        <a id='orgref'>Дата рождения:<br>Населенный пункт:<br>Учебное заведение:<br>Класс:<br><br>E-mail:<br>Телефон:</a>
                    </p>
                </div>
                <div class=\"sectionlk-info-fromserver\"> 
                    <p class=\"about-text2\">
                        <a>" . $userInfo['birthdate'] . "<br>" . $userInfo['city'] . "<br>" . $userInfo['edu_name'] . "<br>" . $classNumber . "<br><br>" . $userInfo['email'] . "<br>" . $userInfo['phone'] . "</a> <!-- БЕРЕТСЯ ИЗ БД -->
                    </p>
                </div>
                <div class=\"sectionlk-info-btn\">
                    <a class=\"cd-link\" href=\"profile-info.php\">Посмотреть всю информацию</a>
                </div>
                <a class=\"about-text1 sectionlk-info-testinfo\" >ВНИМАНИЕ! <br> Тестирование можно пройти лишь 1 раз. На выполнение онлайн-этапа олимпиады дается … минут. Удачи!</a>
                
                <form method=\"post\" action=\"test.php\" class=\"sectionlk-info-test\">
                    <div>
                        <button type=\"submit\" name=\"variant\" class=\"cd-link\" value=\"" . $userInfo['variant'] . "\">Начать тестирование</button>
                    </div>
                </form>

                <div class=\"sectionlk-info-exit\">
                    <a class=\"cd-signin\" href=\"src/php/user_disconnect.php\">Выйти</a>
                </div>
            </div>
        </section>
    </div>
";
$footer = file_get_contents((__DIR__) . '/footer.php');

echo $header . $mainPage . $footer;
