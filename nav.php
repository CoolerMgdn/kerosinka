<?php
session_start();

$buttons = "
    <li><a class=\"cd-link\" href=\"index.php\">Главная</a></li>
    <li><a class=\"cd-link\" href=\"questions.php\">Вопрос-ответ</a></li>
    <li><a class=\"cd-link\" href=\"documents.php\">Нормативные документы</a></li>
";

if ($_SESSION['USER_ID'] && $_SESSION['REGISTRATION_ID']) {
    $buttons .= "
        <li><div id=\"signin\"><a class=\"cd-signin\" href=\"profile.php\">Личный кабинет</a></div></li>
    ";
} else {
    $buttons .= "
        <li><div id=\"signin\"><a class=\"cd-signin\" href=\"login.php\">Вход/Регистрация</a></div></li>
    ";
}


$header = "
    <link rel=\"shortcut icon\" href=\"./src/img/logo.png\" type=\"image/png\">
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js\" type=\"text/javascript\"></script>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css\">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
    <link rel=\"stylesheet\" href=\"./src/style/main.css\">
</head>
<body>

<header role=\"banner\">
        <nav class=\"main-nav\">
            <div class=\"brand\" id=\"brand\">
                <div class=\"img\" id=\"logo-header\"><a href=\"index.php\"><img src=\"src/img/logo.png\"  alt=\"img\"></a></div>
                <div id=\"word-mark\"><h1>Междисциплинарная олимпиада школьников<p><kerosinka>«КЕРОСИНКА»</kerosinka></p></h1></div>
            </div>
            <div id=\"menu\">
                <div id=\"menu-toggle\">
                    <div id=\"menu-icon\">
                        <div class=\"bar\"></div>
                        <div class=\"bar\"></div>
                        <div class=\"bar\"></div>
                    </div>
                </div>
                <ul> <!-- Строки в шапке -->" . $buttons .
                "</ul>
            </div>
        </nav>
    </header>";
