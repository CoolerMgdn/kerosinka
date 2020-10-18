<!DOCTYPE html>
<html lang="en">
<!-- by Sadykov Kamil (Kamil.sadykov@mail.ru) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="shortcut icon" href="./src/img/logo.png" type="image/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
    <link rel="stylesheet" href="./src/style/main.css">
</head>
<body>
    <!-- Шапка -->
    <?php
        include('nav.php');
    ?>

    <!-- РГУНГ -->
    <section id="section00"> </section>

    <!-- Личный кабинет (подробно) -->
    <div class="container">
        <section id="sectionlk">
            <a class="about-text">Полная информация</a><br>
            <!-- Контейнер с данными пользователя (grid) -->
            <div class="sectionlk-info">
                <div class="sectionlk-info-text">
                    <p class="about-text2">
                        <a id='orgref'>Фамилия:<br>Имя:<br>Отчество:<br>Пол:<br>Дата рождения:<br><br>Регион РФ:<br>Населенный пункт:<br>Класс:<br>Учебное заведение:<br>Адрес учебного заведения:<br><br>E-mail:<br>Телефон:<br>Почтовый индекс:<br>Населенный пункт:<br>Улица:<br>Дом:<br>Квартира:</a>
                    </p>
                </div>
                <div class="sectionlk-info-fromserver"> 
                    <p class="about-text2">
                        <a>16.02.2000 (ИЗ БД)<br>Магадан (ИЗ БД)<br>МАОУ "Лицей ЭБ" (ИЗ БД)<br>11 (ИЗ БД)<br><br>Kamil.sadykov@mail.ru (ИЗ БД)<br>+7 (914) 034-29-45 (ИЗ БД)</a> <!-- БЕРЕТСЯ ИЗ БД -->
                    </p>
                </div>
                <div class="sectionlk-info-btn">
                    <a class="cd-link" href="profile.php">Назад</a>
                </div>
            </div>
        </section>
    </div>

    <!-- Контактная информация (footer) -->
	<?php
        include('footer.php');
    ?>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://github.com/simplefocus/FlowType.JS/blob/master/flowtype.js'></script>
    <script src="./src/js/jquery.maskedinput.min.js"></script>
    <script src="./src/js/script.js"></script>
</body>
<!-- by Sadykov Kamil (Kamil.sadykov@mail.ru) -->
</html>