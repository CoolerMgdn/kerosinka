<?php
require('nav.php');

$header = "
    <!DOCTYPE html>
    <html lang=\"en\">
    <!-- by Sadykov Kamil (Kamil.sadykov@mail.ru) -->
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Регистрация</title>
    " . $header;

$mainPage = "
    <!-- РГУНГ -->
    <section id=\"section00\"> </section>

    <!-- Регистрация -->
    <div class=\"container\">
        <section id=\"section-reg\">
            <a class=\"about-text5\" display=\"block\">Личный кабинет</a><br>

            <form class=\"formreg\" id='formreg' method=\"post\" action=\"src/php/user_registration.php\">
                
                <div class=\"switch_lk\">
                    <a href=\"login.php\" class=\"about-text5 switch_lk_ref\">Вход</a>
                    <a href=\"registration.php\" class=\"about-text5 switch_lk_ref switch_lk_ref_push\">Регистрация</a>
                </div>

                <a class=\"about-text2\" display=\"block\">Личные данные</a><br>
                
                <div class=\"inputs\">
                    <p>Фамилия<span class=\"redtext\">*</span></p>
                    <input type=\"text\" name=\"lastname\" placeholder=\"Ваша фамилия\" required>
                </div>

                <div class=\"inputs\">
                    <p>Имя<span class=\"redtext\">*</span></p>
                    <input type=\"text\" name=\"firstname\" placeholder=\"Ваше имя\" required>
                </div>

                <div class=\"inputs\">
                    <p>Отчество</p>
                    <input type=\"text\" name=\"patronymic\" placeholder=\"Ваше отчество\">
                </div>
                    
                <div class=\"inputs\">
                    <p>Пол<span class=\"redtext\">*</span></p>
                    <select class=\"select\" name=\"sex\" placeholder=\"Муж или Жен\" required>
                        <option value=\"\" selected=\"selected\" disabled=\"disabled\">Ваш пол</option>
                        <option value=\"Муж\">Мужской</option>
                        <option value=\"Жен\">Женский</option>
                    </select>
                </div>
                    
                <div class=\"inputs\">
                    <p>Дата рождения<span class=\"redtext\">*</span></p>
                    <input type=\"text\" name=\"birthdate\" id='birdth' placeholder=\"дд.мм.гггг\" required> <br>
                </div>

                <a class=\"about-text2\" display=\"block\">Учебное заведение</a><br>

                <div class=\"inputs\">
                    <p>Регион РФ<span class=\"redtext\">*</span></p>
                    <input type=\"text\" name=\"region_id\" placeholder=\"Номер вашего региона\" maxlength=\"3\" required>
                </div>

                <div class=\"inputs\">
                    <p>Населенный пункт<span class=\"redtext\">*</span></p>
                    <input  type=\"text\" name=\"edu_city\" placeholder=\"(Город, село, хутор и т.п.)\" required>
                </div>

                <div class=\"inputs\">
                    <p>Класс<span class=\"redtext\">*</span></p>
                    <select class=\"select\" name=\"class_number\" placeholder=\"В каком классе вы обучаетесь\" required>
                        <option value=\"\" selected=\"selected\" disabled=\"disabled\">Ваш класс</option>
                        <option value=\"9\">9</option>
                        <option value=\"10\">10</option>
                        <option value=\"11\">11</option>
                        <option value=\"0\">Не школьник</option>
                    </select>
                </div>

                <div class=\"inputs\">
                    <p>Учебное заведение</p>
                    <input  type=\"text\" name=\"edu_name\" placeholder=\"Название учебного заведения\">
                </div>

                <div class=\"inputs\">
                    <p>Адрес учебного заведения</p>
                    <input  type=\"text\" name=\"edu_address\" placeholder=\"Адрес школы (лицея)\"><br>
                </div>

                <a class=\"about-text2\" display=\"block\">Координаты для связи</a><br>

                <div class=\"inputs\">
                    <p>E-mail<span class=\"redtext\">*</span></p>
                    <input  type=\"text\" name=\"email\" placeholder=\"example@mail.ru\" required>
                </div>
                    
                <span id=\"valid_email_message\" class=\"mesage_error\"></span>

                <div class=\"inputs\">
                    <p>Мобильный телефон<span class=\"redtext\">*</span></p>
                    <input  type=\"text\" name=\"phone\" id='phone' placeholder=\"+7 (___) ___-__-__\" required>
                </div>
                
                <div class=\"inputs\">
                    <p>Почтовый индекс<span class=\"redtext\">*</span></p>
                    <input  type=\"text\" name=\"post_index\" id='zip_index' placeholder=\"Почтовый индекс\" maxlength=\"6\" required>
                </div>
                    
                <div class=\"inputs\">
                    <p>Населенный пункт<span class=\"redtext\">*</span></p>
                    <input  type=\"text\" name=\"city\" placeholder=\"(Город, село, хутор и т.п.)\" required>
                </div>
                <div class=\"inputs\">
                    <p>Улица<span class=\"redtext\">*</span></p>
                    <input  type=\"text\" name=\"street\" placeholder=\"Улица\" required>
                </div>
                <div class=\"inputs\">
                    <p>Дом<span class=\"redtext\">*</span></p>
                    <input  type=\"text\" name=\"house\" placeholder=\"Номер дома\" required>
                </div>
                <div class=\"inputs\">
                    <p>Квартира</p>
                    <input  type=\"text\" name=\"apartment\" placeholder=\"Номер квартиры\"> <br>
                </div>
                
<!--
                <div class=\"inputs\">
                    <p>Пароль<span class=\"redtext\">*</span></p>
                    <input  type=\"password\" name=\"password\" placeholder=\"Введите пароль\" required>
                </div>

                <span id=\"valid_password_message\" class=\"mesage_error\"></span>
                <div class=\"inputs\">
                    <p>Подтверждение пароля<span class=\"redtext\">*</span></p>
                    <input  type=\"password\" name=\"confirm_password\" placeholder=\"Повторите пароль\" required>
                </div>
                <span id=\"valid_confirm_password_message\" class=\"mesage_error\"></span>
-->

                <p class=\"usersconf\" >Нажимая кнопку «Зарегистрироваться», Вы автоматически соглашаетесь с <a id='mailref' target=\"_blank\" href=\"documents/Politica_confidecialnosti.docx\">политикой конфиденциальности</a> и даете свое согласие на обработку персональных данных. Ваши данные не будут переданы третьим лицам.</p>
                <input type=\"submit\" id=\"regbutton\" name=\"btn_submit_register\" value=\"Зарегистрироваться\">
            </form>
        </section>
    </div>
";
$footer = file_get_contents((__DIR__) . '/footer.php');

echo $header . $mainPage . $footer;
