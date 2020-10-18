<?php
require_once('include.php');
require('nav.php');

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
    select i.lastname, i.firstname, i.patronymic, i.sex, date_format(i.birthdate, '%d.%m.%Y') as birthdate, i.city, 
        i.edu_city, edu_address, i.edu_name, i.class_number, i.region_id, i.phone, i.post_index, r.email, i.city, 
        i.street, i.house, i.apartment
    from USER_INFO i
    join USER_REGISTER r
        on r.user_id = i.user_id
    where i.user_id = {$userId};
";
$rawGetInfo = mysqli_query($conn, $sqlGetInfo);
$userInfo = mysqli_fetch_array($rawGetInfo, MYSQLI_ASSOC);

$classNumber = $userInfo['class_number'] == 0 ? 'Не школьник' : $userInfo['class_number'];
$sex = $userInfo['sex'] == 'M' ? 'Муж' : 'Жен';

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

    <!-- Личный кабинет (подробно) -->
    <div class=\"container\">
        <section id=\"sectionlk\">
            <a class=\"about-text\">Полная информация</a><br>
            <!-- Контейнер с данными пользователя (grid) -->
            <div class=\"sectionlk-info\">
                <div class=\"sectionlk-info-text\">
                    <p class=\"about-text2\">
                        <a id='orgref'>Фамилия:<br>Имя:<br>Отчество:<br>Пол:<br>Дата рождения:<br><br>Регион РФ:<br>Населенный пункт школы:<br>Класс:<br>Учебное заведение:<br>Адрес учебного заведения:<br><br>E-mail:<br>Телефон:<br>Почтовый индекс:<br>Населенный пункт:<br>Улица:<br>Дом:<br>Квартира:</a>
                    </p>
                </div>
                <div class=\"sectionlk-info-fromserver\"> 
                    <p class=\"about-text2\">
                        <a>" . $userInfo['lastname'] . "<br>" . $userInfo['firstname'] . "<br>" . $userInfo['patronymic'] . "<br>" . $sex . "<br>" . $userInfo['birthdate'] . "<br><br>" .
    $userInfo['region_id'] . "<br>" . $userInfo['edu_city'] . "<br>" . $classNumber . "<br>" . $userInfo['edu_name'] . "<br>" . $userInfo['edu_address'] . "<br><br>" .
    $userInfo['email'] . "<br>" . $userInfo['phone'] . "<br>" . $userInfo['post_index'] . "<br>" . $userInfo['city'] . "<br>" . $userInfo['street'] . "<br>" . $userInfo['house'] . "<br>" . $userInfo['apartment'] .
                    "</p>
                </div>
                <div class=\"sectionlk-info-btn\">
                    <a class=\"cd-link\" href=\"profile.php\">Назад</a>
                </div>
            </div>
        </section>
    </div>
    ";
$footer = file_get_contents((__DIR__) . '/footer.php');

echo $header . $mainPage . $footer;
