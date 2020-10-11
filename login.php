<!DOCTYPE html>
<html lang="en">
<!-- by Sadykov Kamil (vk.com/coolermgdn) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
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

    <!-- Авторизация -->
    <div class="container">
        <section id="section-reg">
            <a class="about-text5" display="block">Личный кабинет</a><br>

            <form class="formreg" id='formreg' method="post" action="auth.php"> 
                
                <div class="switch_lk">
                    <a href="login.php" class="about-text5 switch_lk_ref switch_lk_ref_push">Вход</a>
                    <a href="registration.php" class="about-text5 switch_lk_ref">Регистрация</a>
                </div>

                <div class="inputs">
                    <p>E-mail</p>
                    <input  type="text" name="email" placeholder="example@mail.ru" required>
                </div>
                
                <div class="inputs">
                    <p>Пароль</p>
                    <input id="password-input" type="password" name="password" placeholder="Введите пароль" required>
                    <label href="#" class="password-control"></label>
                </div>

                <input type="submit" id="authbutton" name="btn_submit_register" value="Войти">
            </form>
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