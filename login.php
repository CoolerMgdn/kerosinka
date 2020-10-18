<?php
require('nav.php');

$header = "
    <!DOCTYPE html>
    <html lang=\"en\">
    <!-- by Sadykov Kamil (Kamil.sadykov@mail.ru) -->
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Авторизация</title>
    " . $header;

$mainPage = "
    <!-- РГУНГ -->
    <section id=\"section00\"> </section>

    <!-- Авторизация -->
    <div class=\"container\">
        <section id=\"section-reg\">
            <a class=\"about-text5\" display=\"block\">Личный кабинет</a><br>

            <form class=\"formreg\" id='formreg' method=\"post\" action=\"src/php/user_login.php\">
                
                <div class=\"switch_lk\">
                    <a href=\"login.php\" class=\"about-text5 switch_lk_ref switch_lk_ref_push\">Вход</a>
                    <a href=\"registration.php\" class=\"about-text5 switch_lk_ref\">Регистрация</a>
                </div>

                <div class=\"inputs\">
                    <p>E-mail</p>
                    <input  type=\"text\" name=\"email\" placeholder=\"example@mail.ru\" required>
                </div>
                
                <div class=\"inputs\">
                    <p>Пароль</p>
                    <input id=\"password-input\" type=\"password\" name=\"password\" placeholder=\"Введите пароль\" required>
                    <label href=\"#\" class=\"password-control\"></label>
                </div>

                <input type=\"submit\" id=\"authbutton\" name=\"btn_submit_register\" value=\"Войти\">
            </form>
        </section>
    </div>
";
$footer = file_get_contents((__DIR__) . '/footer.php');

echo $header . $mainPage . $footer;
