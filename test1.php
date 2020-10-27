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
    select t.user_id, t.start_date
    from USER_TESTS t
    where t.user_id = {$userId};
";
$rawGetInfo = mysqli_query($conn, $sqlGetInfo);
if ($rawGetInfo->num_rows) {
    die('Вы уже проходили тестирование. На эту страницу Вы зайти более не сможете!');
}
$userInfo = mysqli_fetch_array($rawGetInfo, MYSQLI_ASSOC);

$timestamp = date("Y-m-d H:i:s");
$sqlFirstInsert = "
    insert into USER_TESTS
        (user_id, start_date)
    values
        ({$userId}, {$timestamp});
";
mysqli_query($conn, $sqlFirstInsert);

$header = "
    <!DOCTYPE html>
    <html lang=\"en\">
    <!-- by Sadykov Kamil (Kamil.sadykov@mail.ru) -->
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Онлайн этап олимпиады</title>
    " . $header;

$mainPage = "
    <!-- РГУНГ -->
    <section id=\"section00\"> </section>

    <!-- Тест -->
    <div class=\"container\">
        <section id=\"section-reg\">
            <a class=\"about-text5\" display=\"block\">Онлайн этап олимпиады</a><br>

            <form class=\"formtest\" id='formtest' method=\"post\" action=\"src/php/write_tasks.php\">

                <a class=\"about-text5\" display=\"block\">Часть 1</a><br>
                <a class=\"about-text3\" display=\"block\">Ответами к заданиям 1-15 являются число, буква, последовательность цифр или букв. Ответ запишите в поле без пробелов, запятых и других дополнительных символов.<br>
                Задания Часть 1 могут иметь несколько правильных вариантов ответа. Ответ засчитывается только в том случае, если выбраны ВСЕ верные варианты ответа.<br>Задания 1-15  оцениваются в 1 балл.
                </a><br>

                <a class=\"about-text2\" display=\"block\">1.   В каких трёх из перечисленных регионов России ведётся добыча природного газа?</a><br>
                <div class=\"inputs checkbox3\">
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='A'> A. Республика Татарстан</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='B'> B. Астраханская область</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='C'> C. Ямало-Ненецкий автономный округ</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='D'> D. Кемеровская область</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='E'> E. Смоленская область</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='F'> F. Ханты-Мансийский автономный округ </label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">2.	Какая из предложенных причин высыхания Аральского моря является основной? </a><br>
                <div class=\"inputs\">
                    <label><input type='radio' name='tests[1][]' value='B'> A. Активный забор воды из озера местными жителями</label><br>
                    <label><input type='radio' name='tests[1][]' value='B'> B. Строительство оросительных каналов на Амударье и Сырдарье</label>
                </div>

                <a class=\"about-text2\" display=\"block\">3.	Выберете верную формулировку термина «деградация». Деградация – это?</a><br>
                <div class=\"inputs\">
                    <label><input type='radio' name='tests[2][]' value='A'> A. разрушение горных пород и почв поверхностными водными потоками и ветром, включающее в себя отрыв и вынос обломков материала и сопровождающееся их отложением.</label><br>
                    <label><input type='radio' name='tests[2][]' value='B'> B. процесс накопления в почве легкорастворимых в воде солей в количествах, токсичных для сельскохозяйственных культур.</label><br>
                    <label><input type='radio' name='tests[2][]' value='C'> C. уменьшение порового пространства в почве, вызванное потерей влаги при ее высушивании или под действием внешнего давления.</label><br>
                    <label><input type='radio' name='tests[2][]' value='D'> D. снижение способности почв обеспечивать существование людей.</label>
                </div>

                <a class=\"about-text2\" display=\"block\">4.	Выберете пять основных задач экологического мониторинга.</a><br>
                <div class=\"inputs checkbox5\">
                    <label><input type=\"checkbox\" name=\"tests[3][]\" value='A'> A. Наблюдение за состоянием биосферы</label><br>
                    <label><input type=\"checkbox\" name=\"tests[3][]\" value='B'> B. Оценка и прогноз ее состояния</label><br>
                    <label><input type=\"checkbox\" name=\"tests[3][]\" value='C'> C. Определение степени антропогенного воздействия на окружающую среду</label><br>
                    <label><input type=\"checkbox\" name=\"tests[3][]\" value='D'> D. Выявление факторов и источников воздействия</label><br>
                    <label><input type=\"checkbox\" name=\"tests[3][]\" value='E'> E. Экологическая ориентация хозяйственной деятельности</label><br>
                    <label><input type=\"checkbox\" name=\"tests[3][]\" value='F'> F. Установление соответствия намечаемой хозяйственной и иной деятельности экологическим требованиям </label>
                </div>

                <a class=\"about-text2\" display=\"block\">5.   --------------------------------------------------------------------------------------</a><br>
                <div class=\"inputs\">
                <label><input type='radio' name='tests[4][]' value='A'> A.</label><br>
                <label><input type='radio' name='tests[4][]' value='B'> B.</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">6. Среди перечисленных населенных пунктов, получивших своё название от соляных промыслов, найдите два города Ближнего Зарубежья.</a><br>
                <div class=\"inputs checkbox2\">
                    <label><input type=\"checkbox\" name=\"tests[5][]\" value='A'> A. Солигалич</label><br>
                    <label><input type=\"checkbox\" name=\"tests[5][]\" value='B'> B. Солигорск</label><br>
                    <label><input type=\"checkbox\" name=\"tests[5][]\" value='C'> C. Сольцы</label><br>
                    <label><input type=\"checkbox\" name=\"tests[5][]\" value='D'> D. Усолье</label><br>
                    <label><input type=\"checkbox\" name=\"tests[5][]\" value='E'> E. Соледар</label><br>
                    <label><input type=\"checkbox\" name=\"tests[5][]\" value='F'> F. Соль-Илецк</label><br>
                    <label><input type=\"checkbox\" name=\"tests[5][]\" value='G'> G. Соликамск</label><br>
                    <label><input type=\"checkbox\" name=\"tests[5][]\" value='H'> H. Усолье Сибирское</label><br>
                    <label><input type=\"checkbox\" name=\"tests[5][]\" value='I'> I. Солт-Лейк-Сити</label><br>
                    <label><input type=\"checkbox\" name=\"tests[5][]\" value='J'> J. Сольвычегодск </label>
                </div>

                <a class=\"about-text2\" display=\"block\">7. Какая из перечисленных стран имеет высокий доход национального бюджета, связанного с экспортом нефти?</a><br>
                <div class=\"inputs\">
                    <label><input type='radio' name='tests[6][]' value='A'> A.	Перу</label><br>
                    <label><input type='radio' name='tests[6][]' value='B'> B.	Экваториальная Гвинея</label><br>
                    <label><input type='radio' name='tests[6][]' value='C'> C.	Белиз</label><br>
                    <label><input type='radio' name='tests[6][]' value='D'> D.	Малави</label><br>
                    <label><input type='radio' name='tests[6][]' value='E'> E.	Новая Зеландия</label>
                </div>

                <a class=\"about-text2\" display=\"block\">8. Какие два высказывания являются верными?</a><br>
                <div class=\"inputs checkbox2\">
                    <label><input type=\"checkbox\" name=\"tests[7][]\" value='A'> A. Основным источником выброса парниковых газов в атмосферу является работа атомных электростанций </label><br>
                    <label><input type=\"checkbox\" name=\"tests[7][]\" value='B'> B. Нефть относится к исчерпаемому невозобновляемому источнику энергии  </label><br>
                    <label><input type=\"checkbox\" name=\"tests[7][]\" value='C'> C. Сжигание попутного природного газа при нефтедобыче является примером рационального природопользования </label><br>
                    <label><input type=\"checkbox\" name=\"tests[7][]\" value='D'> D. Использование машин и механизмов при строительстве трубопроводов приводит к нарушению структуры почв и снижению их плодородия </label><br>
                    <label><input type=\"checkbox\" name=\"tests[7][]\" value='E'> E. Одной из причин глобального потепления климата считается сокращение выбросов углекислого газа в атмосферу </label><br>
                    <label><input type=\"checkbox\" name=\"tests[7][]\" value='F'> F. Сжигание попутного нефтяного газа (ПНГ) в факелах в районах нефтедобычи способствует сдерживанию развития парникового эффекта в атмосфере</label>
                </div>

                <a class=\"about-text2\" display=\"block\">9. Продолжите высказывание. </a><br>
                <div class=\"inputs\">
                    <label>Перечень объектов, подлежащих федеральному государственному экологическому контролю, определяется….</label><br><br>
                    <label><input type='radio' name='tests[8][]' value='A'> A.	Министерством природных ресурсов РФ</label><br>
                    <label><input type='radio' name='tests[8][]' value='B'> B.	Государственным комитетом по охране окружающей среды РФ</label><br>
                    <label><input type='radio' name='tests[8][]' value='C'> C.	Президентом  РФ</label><br>
                    <label><input type='radio' name='tests[8][]' value='D'> D.	Правительством РФ</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">10. Продолжите высказывание.</a><br>
                <div class=\"inputs\">
                    <label>Нормативы допустимого воздействия на окружающую среду должны обеспечивать…</label><br><br>
                    <label><input type='radio' name='tests[9][]' value='A'> A.	соблюдение качества окружающей среды</label><br>
                    <label><input type='radio' name='tests[9][]' value='B'> B.	благоприятные условия для жизнедеятельности</label><br>
                    <label><input type='radio' name='tests[9][]' value='C'> C.	экологическую безопасность</label><br>
                    <label><input type='radio' name='tests[9][]' value='D'> D.	соблюдение норм экологического законодательства</label>
                </div>

                <a class=\"about-text2\" display=\"block\">11.  Продолжите высказывание.</a><br>
                <div class=\"inputs\">
                    <label>Одним из основных принципов экологического права является…</label><br><br>
                    <label><input type='radio' name='tests[10][]' value='A'> A.	презумпция опасности любой экологической деятельности</label><br>
                    <label><input type='radio' name='tests[10][]' value='B'> B.  презумпция невиновности государственных органов в сфере природопользования</label><br>
                    <label><input type='radio' name='tests[10][]' value='C'> C.  презумпция безвозмездности природопользования</label>
                </div>

                <a class=\"about-text2\" display=\"block\">12. Вставьте пропущенные словосочетания.</a><br>
                <div class=\"inputs checkbox2\">
                    <label>_______________ и _____________ устанавливают экологические права и обязанности субъектам экологического права.</label><br><br>
                    <label><input type='radio' name='tests[11][]' value='A'> A.  Конституция РФ</label><br>
                    <label><input type='radio' name='tests[11][]' value='B'> B.  ФЗ “Об охране окружающей среды»</label><br>
                    <label><input type='radio' name='tests[11][]' value='C'> C.	ФЗ “Об охране природной среды»</label><br>
                    <label><input type='radio' name='tests[11][]' value='D'> D.  Декларация прав и свобод человека и гражданина</label>
                </div>

                <a class=\"about-text2\" display=\"block\">13. Какое(ие) из перечисленных суждений верны? </a><br>
                <div class=\"inputs\">
                    <label>А) Ферменты, продуцируемые бактериями вида Alcanivorax borkumensis, очищают почву загрязненную нефтепродуктами простым, эффективным и экологически безопасным способом</label><br><br>
                    <label>Б) Разливы нефти в местах обитания могут оказать как быстрое, так и длительное влияние на птиц.</label><br><br>
                    <label><input type='checkbox' name='tests[12][]' value='A'> A.  Верно только А</label><br>
                    <label><input type='checkbox' name='tests[12][]' value='B'> B.  Верно только Б</label><br>
                    <label><input type='checkbox' name='tests[12][]' value='C'> C.	Оба суждени верны</label>
                </div>

                <a class=\"about-text2\" display=\"block\">14. Основными источниками загрязнения воздуха являются теплоэнергетика, черная и цветная металлургия, химическая промышленность, транспорт, нефте - и газопереработка.
                Какие из перечисленных загрязняющих веществ  поступают в окружающую среду от предприятий транспорта?
                </a><br>
                <div class=\"inputs\">
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='A'> A. Оксиды углерода </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='B'> B. Оксид азота </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='C'> C. Оксид серы  </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='D'> D. Пыль </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='E'> E. Металлы </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='F'> F. Углеводороды</label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='G'> G. Диоксид серы   </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='H'> H. Фтористые газы  </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='I'> I. Сероводород</label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='J'> J. Дурнопахнущие газы </label>
                </div>

                <a class=\"about-text2\" display=\"block\">15. Какие из перечисленных природных ресурсов относятся к исчерпаемым –возобновляемым?</a><br>
                <div class=\"inputs\">
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='A'> A. Солнечная энергия </label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='B'> B. Флора и фауна </label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='C'> C. Полезные ископаемые  </label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='D'> D. Энергия ветра </label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='E'> E. Представители флоры и фауны </label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='F'> F. Энергия земных недр</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='G'> G. Энергия морских приливов и волн    </label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='H'> H. Плодородие почв  </label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='I'> I. Пресная вода</label>
                </div>

                <a class=\"about-text5\" display=\"block\">Часть 2</a><br>
                <a class=\"about-text3\" display=\"block\">Ответами к заданиям 16-20  являются последовательность цифр, букв, а также слова и словосочетания. Ответ запишите в поле без пробелов, запятых и других дополнительных символов.<br>Задания оцениваются в 2 балла.</a><br>

                <a class=\"about-text2\" display=\"block\">16. Ознакомьтесь со статьей «Методика выявления и оценки нефтепродуктового загрязнения геологической среды», Круподеров И.В.. Какие существуют методы выявление в геологической среде очагов всех форм нефтяного загрязнения? Приведите не менее двух примеров.</a><br>
                <div class=\"inputs\">
                    <img src=\"./src/img/1var16.png\" alt='12321312'><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[15]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">17. Ознакомьтесь с презентацией «Перспективные технологии идентификации и ликвидации глубинных загрязнений при добыче и переработке нефти». Какой способ борьбы с образованием линз и загрязнением подземных вод нефтепродуктами представлен на рисунке?</a><br>
                <div class=\"inputs\">
                    <label><a id='docref1' target=\"_blank\" href=\"https://www.gubkin.ru/faculty/chemical_and_environmental/chairs_and_departments/industrial_ecology/News/Ostakh.pdf\">Ссылка на презентацию</a></label> <br><br>
                    <img src=\"./src/img/1var17.png\"><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[16]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">18. Прочитайте ниже приведенный текст. О каком нефтяном месторождении идет речь?</a><br>
                <div class=\"inputs\">
                    <label>«10 февраля 1983 года танкер столкнулся с нефтяной платформой. Поскольку в то время произошла первая война в Персидском заливе между Ираком и Ираном, примерно через месяц иракские вертолеты обстреляли платформу, что привело к разливу нефти. Только в сентябре того же года техники смогли устранить повреждения из-за продолжающейся войны. Результат: разлито 260 000 тонн сырой нефти».</label><br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[17]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">19. Установите соответствие: полезное ископаемое – месторождение – страна, на территории которой оно находится. Ответ дайте в виде последовательности букв и цифр без пробелов.</a><br>
                <div class=\"inputs\">
                    <label>
                        A. Алмазы<br>B. Природный газ<br>C. Бокситы<br>D. Медные руды<br>E. Нефть<br>
                    </label><br>
                    <label>
                        1. Чукикамата<br>2. Газли<br>3. Тенгиз<br>4. Уэйпа<br>5. Мирный<br>
                    </label><br>
                    <label>
                        I. Казахстан<br>II. Россия<br>III. Узбекистан<br>IV. Чили<br>V. Автралия<br>  
                    </label><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[18]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">20. Установите соответствие. Ответ дайте в виде последовательности букв, без пробелов.</a><br>
                <div class=\"inputs\">
                    <label>
                        A. Легкие фракции нефти<br>B. Тяжелые фракции<br>
                    </label><br>
                    <label>
                        1. Петролейная<br>2. Бензиновая<br>3. Вакуумный газолий<br>4. Гудрон<br>
                    </label><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[19]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text5\" display=\"block\">Часть 3</a><br>
                <a class=\"about-text3\" display=\"block\">Задания 21-22 требуют развернутый ответ в виде 5-6 предложений.<br>Задания оцениваются в 3 балла.</a><br>

                <a class=\"about-text2\" display=\"block\">21.  Прочитайте ниже приведенный текст. Какие последствия приносят ежегодные загрязнения? Приведите методы борьбы с ними.</a><br>
                <div class=\"inputs\">
                    <label>Индийский Гоа традиционно славится своими комфортными пляжами с белоснежным песком, чистой и тёплой водой и отличным сервисом. Но раз в год происходит разлив мазута на пляжи Гоа из-за недалеко находящейся станции по очистке нефтеперевозящих танкеров.</label><br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[20]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">22.  Как нефть и нефтепродукты оказывают влияние на природные поверхностные воды?</a><br>
                <div class=\"inputs\">
                    <input type=\"text\" class= 'input_text' name=\"tests[21]\" placeholder=\"Ответ\">
                </div>
                <br><br><br>

                <input type=\"submit\" class= 'test_finish' id=\"regbutton\" name=\"btn_submit_register\" value=\"Закончить тест\">
            </form>
        </section>
    </div>
";
$footer = file_get_contents((__DIR__) . '/footer.php');

echo $header . $mainPage . $footer;