<?php
require('nav-home.php');

$userInfo = $_SESSION['userInfo'];
$userTasks = $_SESSION['userTasks'];

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

    <!-- Панель администратора -->
    <div class=\"container\">
        <section id=\"sectionlk\">
            <a class=\"about-text\">Панель администратора</a><br>
            <form class='formadmin' id='formadmin' method='post' action='src/php/read_info.php'>
                    <div class=\"inputs\">
                        <input  type='text' name='userId' placeholder='id пользователя' required>
                    </div>
                    <input type=\"submit\" id=\"authbutton\" name=\"btn_submit_register\" value=\"Вывести результаты\">
            </form>

            <div id='javascript_countdown_time'></div>

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
            </div>

            <table class='about-text2'>
                <tbody>
                    <tr>
                        <td>Задание 1</td>
                        <td>" . $userTasks['task_1'] . "</td>
                    </tr>
                    <tr>
                        <td>Задание 2</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 3</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 4</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 5</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 6</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 7</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 8</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 9</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 10</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 11</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 12</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 13</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 14</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 15</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 16</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 17</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 18</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 19</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 20</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 21</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Задание 22</td>
                        <td> </td>
                    </tr>
                </tbody>
            </table>

        </section>
    </div>
    ";
$footer = file_get_contents((__DIR__) . '/footer.php');

echo $header . $mainPage . $footer;
