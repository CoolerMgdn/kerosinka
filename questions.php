<!DOCTYPE html>
<html lang="en">
<!-- by Sadykov Kamil (vk.com/coolermgdn) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вопрос-ответ</title>
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

    <!-- Вопросы и ответы -->
    <div class="container">
        <section id="section-questions">
            <a class="about-text">Где, куда, когда, откуда, почему, зачем, и как... или часто задаваемые вопросы</a><br><br><br>
            <a class="about-text3">1. Как подать заявку для участия в олимпиаде?</a>
            <a class="about-text2" id="vopros" >Заявку подавать не нужно, заявкой является регистрация в тестирующей системе.</a> <br>
            <a class="about-text3">2. Как устроена олимпиада?</a>
            <a class="about-text2" id="vopros">В олимпиаде два этапа. Первый этап – заочный. Можно выполнить задания дома, в школе. Второй этап – очный, проводится на площадке Российского государственного университеа нефти и газа (национальный исследовательский университет) имени И.М. Губкина.<br><br>Задания первого этапа состоят из тестовых вопросов и вопросов, требующих развернутого ответа.<br>Задания второго этапа представлены в виде мини-кейсов по тематике олимпиады.</a> <br>
            <a class="about-text3">3. Кто может принимать участие в олимпиаде?</a>
            <a class="about-text2" id="vopros">В первом этапе могут участвовать все желающие. Здесь достаточно только потратить немного времени на регистрацию и получить свой вариант задания. Если ты молодец и справился с заданиями первого этапа, добро пожаловать на второй этап.</a> <br>
            <a class="about-text3">4. Могут ли принять участие в олимпиаде не школьники?</a>
            <a class="about-text2" id="vopros">В олимпиаде могут принять участие все желающие, но на очный этап приглашаются только школьники. Не-школьникам нужно при редактировании информации в тестирующей системе указать правильный статус и в поле «Класс» указать «Участник вне конкурса».</a> <br>
            <a class="about-text3">5. Как увидеть набранное количество баллов по заданиям при прохождении тура? После прохождения тура?</a>
            <a class="about-text2" id="vopros">Все результаты, которые были отосланы на сервер, сохраняются. Результаты первого и второго этапов будут вывешены на сайте.</a> <br>
            <a class="about-text3">6. Сроки проведения олимпиады?</a>
            <a class="about-text2" id="vopros">Первый этап примерно май<br><br>Второй сентябрь</a> <br>
            <a class="about-text3">7. У меня есть вопрос по условию (по проверке), как его задать?</a>
            <p class="about-text2" id="vopros">Вопросы по условиям или по проверке нужно задавать <A id="docref1" href="mailto: olympigubkin@mail.ru" id='mailref' >на почту</A> . Жюри отвечает на вопросы как правило, в течение одного-двух дней, в сложных случаях ответ может потребовать нескольких дней.</p> <br>
            <a class="about-text3">8. Какие льготы получают призеры олимпиады? Примут ли меня в вуз без экзаменов?</a>
            <a class="about-text2" id="vopros">???</a> <br>
            <a class="about-text3">9. Я ошибся, когда вводил личные данные. Как мне изменить их?</a>
            <a class="about-text2" id="vopros">Если вы по какой-либо причине неправильно ввели свои данные при регистрации, то свяжитесь с нами любым удобным для вас способом для уточнения ошибки.</a> <br>
            <a class="about-text3">10. Где можно пройти онлайн-этап олимпиады?</a>
            <a class="about-text2" id="vopros">Для прохождения онлайн-этапа олимпиады, Вам необходимо авторизоваться на сайте и перейти на страницу личного кабинета. На этой странице вы увидете свои личные данные и кнопку «Пройти онлайн-этап».</a> <br>
            <br>
            <p class="about-text2">Если остались какие-то вопросы <A href="mailto: olympigubkin@mail.ru" id='mailref' >пиши нам</A>, мы всегда рады помочь!</p>
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
<!-- by Sadykov Kamil (vk.com/coolermgdn) -->
</html>