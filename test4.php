<?php
require_once('include.php');
require('header.php');

//if (!$_SESSION['USER_ID'] || !$_SESSION['REGISTRATION_ID']) {
    //die('Войдите в лк!');
//}

$userId = $_SESSION['USER_ID'];

$conn = mysqli_connect(HOST, USER, PASSWORD);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn, 'kerosinkaDB');

$sqlGetInfo = "
    select i.lastname, i.firstname, i.patronymic, date_format(i.birthdate, '%d.%m.%Y') as birthdate, i.city, i.edu_name, i.class_number, i.phone, r.email
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

                <a class=\"about-text2\" display=\"block\">1.	В результате какой хозяйственной деятельности человека развивается эвтрофикация водоема? Выберете несколько вариантов ответа.</a><br>
                <div class=\"inputs\">
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='A'> A. Использование удобрений в сельском хозяйстве</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='B'> B. Использование моющих средств</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='C'> C. Загрязнение воды и почвы нефтяными отходами</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='D'> D. Сброс твердых бытовых отходов в водоем</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">2.	От чего зависит противоэрозионная способность почв?</a><br>
                <div class=\"inputs\">
                    <label><input type='checkbox' name='tests[1][]' value='B'> A. Содержания гумуса и карбонатов </label><br>
                    <label><input type='checkbox' name='tests[1][]' value='B'> B. Концентрации катионов в поглощающем комплексе </label><br>
                    <label><input type='checkbox' name='tests[1][]' value='C'> C. Механических свойств почвы</label><br>
                    <label><input type='checkbox' name='tests[1][]' value='D'> D. Агрегатных свойств почвы </label><br>
                    <label><input type='checkbox' name='tests[1][]' value='E'> E. Все ответы верные</label>
                </div>

                <a class=\"about-text2\" display=\"block\">3.   Как называются горные породы, перекрывающие полезные ископаемые, подлежащие выемке и перемещению в процессе открытых горных работ? Выберете один вариант ответа.</a><br>
                <div class=\"inputs\">
                    <label><input type='radio' name='tests[2][]' value='A'> A. Вскрышные породы</label><br>
                    <label><input type='radio' name='tests[2][]' value='B'> B. Пустые породы </label><br>
                    <label><input type='radio' name='tests[2][]' value='C'> C. Почва </label><br>
                    <label><input type='radio' name='tests[2][]' value='D'> D. Строительные породы </label><br>
                    <label><input type='radio' name='tests[2][]' value='E'> E. Выработанные породы</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">4.	Выберете верное определение термина «инженерные изыскания». Инженерные изыскания это?</a><br>
                <div class='inputs'>
                    <label><input type='radio' name=\"tests[3][]\" value='A'> A. Мероприятия, которые должны обеспечивать комплексное изучение природных условий района, площадки, участка, трассы, проектируемого строительства, местных строительных материалов и источников водоснабжения, получение необходимых и достаточных материалов для разработки экономически целесообразных и технически обоснованных решений при проектировании и строительстве объектов с учетом рационального использования и охраны природной среды, а также получение данных для составления прогноза изменений природной среды под воздействием строительства и эксплуатации предприятии, здании и сооружении.</label><br>
                    <label><input type='radio' name=\"tests[3][]\" value='B'> B. Комплекс мероприятий по наблюдению за окружающей средой в районе воздействия предприятия и прогнозирование изменения состояния экологии в процессе его работы.</label><br>
                    <label><input type='radio' name=\"tests[3][]\" value='C'> C. Система наблюдений, оценки и прогноза изменений в состоянии окружающей среды, созданная с целью выделения антропогенной составляющей этих изменений на фоне природных процессов.</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">5. Выберете основные причины химического загрязнение почв на объектах нефтегазовой отрасли на нефтегазодобывающих предприятиях.</a><br>
                <div class='inputs'>
                    <label>Механические нарушения почвенного покрова на всех объектах нефтяной и газовой отрасли связаны с …</label><br><br>
                    <label><input type='checkbox' name=\"tests[4][]\" value='A'> A. возникновение газовых и нефтяных фонтанов</label><br>
                    <label><input type='checkbox' name=\"tests[4][]\" value='B'> B. самовозгорание газа</label><br>
                    <label><input type='checkbox' name=\"tests[4][]\" value='C'> C. выбросы подземных высокоминерализованных вод</label><br>
                    <label><input type='checkbox' name=\"tests[4][]\" value='D'> D. сброс загрязненных сточных вод на рельеф</label><br>
                    <label><input type='checkbox' name=\"tests[4][]\" value='E'> E. разлив буровой жидкости</label><br>
                    <label><input type='checkbox' name=\"tests[4][]\" value='F'> F. ликвидация амбаров</label><br>
                    <label><input type='checkbox' name=\"tests[4][]\" value='G'> G. разлив метанола поступающего от установки регенерации</label><br>
                    <label><input type='checkbox' name=\"tests[4][]\" value='H'> H. складирование шламообразных отходов</label><br>
                    <label><input type='checkbox' name=\"tests[4][]\" value='I'> I. излив пластовой смеси</label><br>
                    <label><input type='checkbox' name=\"tests[4][]\" value='J'> J. выбросы продуктов сгорания топлива</label>
                </div>

                <a class=\"about-text2\" display=\"block\">6. Прочитайте текст. Выберете два российских центра по производству металла, о которых идёт речь.</a><br>
                <div class='inputs checkbox2'>
                    <label>Этот металл применяется для производства очень мощных резервных электрических батарей и сухих элементов. 
                    Он используется в военной технике для изготовления осветительных и сигнальных ракет, трассирующих пуль и снарядов, зажигательных бомб. 
                    Сплавы на основе этого металла являются важным конструкционным материалом в авиационной и автомобильной промышленности благодаря их легкости и прочности. 
                    Химическое соединение на основе этого металла могут использоваться в качестве наиболее емких аккумуляторов водорода, применяемых для его хранения; 
                    огнеупорного материала для производства тиглей и специальной футеровки металлургических печей; синтетических монокристаллов, применяемых в оптике (линзы, призмы).
                    </label><br><br>
                    <label><input type='checkbox' name=\"tests[5][]\" value='A'> A.	Березники </label><br>
                    <label><input type='checkbox' name=\"tests[5][]\" value='B'> B.	Братск</label><br>
                    <label><input type='checkbox' name=\"tests[5][]\" value='C'> C.	Красноярск </label><br>
                    <label><input type='checkbox' name=\"tests[5][]\" value='D'> D.	Новосибирск </label><br>
                    <label><input type='checkbox' name=\"tests[5][]\" value='E'> E.	Соликамск </label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">7. Выберете верную формулировку. Окружающая среда — это?</a><br>
                <div class='inputs'>
                    <label>В частной и муниципальной собственности могут находиться…</label><br><br>
                    <label><input type='radio' name=\"tests[6][]\" value='A'> A.	комплекс функционально и естественно связанных между собой природных объектов</label><br>
                    <label><input type='radio' name=\"tests[6][]\" value='B'> B.	естественные экологические системы, природный ландшафт и составляющие их элементы</label><br>
                    <label><input type='radio' name=\"tests[6][]\" value='C'> C.	совокупность компонентов природной среды, природных и природно-антропогенных объектов, а также антропогенных объектов</label><br>
                    <label><input type='radio' name=\"tests[6][]\" value='D'> D.	совокупность компонентов природной среды, природных и природно-антропогенных объектов</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">8. Продолжите высказывание.</a><br>
                <div class='inputs'>
                    <label>Нормирование в области охраны окружающей среды (экологическое нормирование) осуществляется в порядке, установленном …</label><br><br>
                    <label><input type='radio' name=\"tests[7][]\" value='A'> A.	Федеральными законами</label><br>
                    <label><input type='radio' name=\"tests[7][]\" value='B'> B.	Президентом РФ</label><br>
                    <label><input type='radio' name=\"tests[7][]\" value='C'> C.	Министерством природных ресурсов РФ</label><br>
                    <label><input type='radio' name=\"tests[7][]\" value='D'> D.	Правительством РФ</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">9. Продолжите высказывание.</a><br>
                <div class='inputs'>
                    <label>Нормативы качества окружающей среды - нормативы, установленные в соответствии с химическими, физическими, биологическими и иными показателями для оценки качества окружающей среды и при соблюдении которых …</label><br><br>
                    <label><input type='radio' name=\"tests[8][]\" value='A'> A.	обеспечивается благоприятная окружающая среда</label><br>
                    <label><input type='radio' name=\"tests[8][]\" value='B'> B.	отсутствует загрязнение окружающей среды</label><br>
                    <label><input type='radio' name=\"tests[8][]\" value='C'> C.	выполняются нормативы допустимого  воздействия</label><br>
                    <label><input type='radio' name=\"tests[8][]\" value='D'> D.	обеспечивается экологическая безопасность</label><br>
                </div>
                
                <a class=\"about-text2\" display=\"block\">10. Продолжите высказывание.</a><br>
                <div class='inputs'>
                    <label>Экологическое право это отрасль права, предмет которой составляют отношения, которые …</label><br><br>
                    <label><input type='radio' name=\"tests[9][]\" value='A'> A.	касаются природопользования, охраны окружающей среды, защиты прав и законных интересов физических и юридических лиц в указанных сферах</label><br>
                    <label><input type='radio' name=\"tests[9][]\" value='B'> B.	возникают при использовании природных ресурсов, их добыче, переработке и реализации, в том числе путем экспорта</label><br>
                    <label><input type='radio' name=\"tests[9][]\" value='C'> C.	связаны с охраной флоры и фауны, обеспечением окружающего мира в надлежащем и пригодном для жизни состоянии</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">11. Продолжите высказывание.</a><br>
                <div class='inputs'>
                    <label>Информация о недрах, полученная пользователем за счет государственных средств является …</label><br><br>
                    <label><input type='radio' name=\"tests[10][]\" value='A'> A.	Государственной</label><br>
                    <label><input type='radio' name=\"tests[10][]\" value='B'> B.	Собственностью пользователя</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">12. В результате розлива нефти пострадала экосистема озера с ее обитателями. Спасателям удалось отловить несколько птиц, пострадавших от розлива. Как их отмыть? Выберете один вариант предложенных рекомендаций.</a><br>
                <div class='inputs'>
                    <label><input type='radio' name=\"tests[11][]\" value='A'> A.	Используйте деликатное средство для мытья. Добавьте однопроцентный раствор жидкого средства в теплую воду в ванночке соответствующего размера. Температура воды должна соответствовать температуре тела птицы.</label><br>
                    <label><input type='radio' name=\"tests[11][]\" value='B'> B.	Аккуратно протрите перья марлевой салфеткой, пропитанной спиртом. По мере загрязнения меняйте салфетки.</label><br>
                    <label><input type='radio' name=\"tests[11][]\" value='C'> C.	Промойте большим количеством воды без применения химических средств</label><br>
                    <label><input type='radio' name=\"tests[11][]\" value='D'> D.	Удалите ножницами загрязненные участки птиц вместе с перьями</label>
                </div>

                <a class=\"about-text2\" display=\"block\">13. Основными источниками загрязнения воздуха являются теплоэнергетика, черная и цветная металлургия, химическая промышленность, транспорт, нефте - и газопереработка.
                Какие из перечисленных источников загрязнения относятся к группе предприятий-загрязнителей:  теплоэнергетика?</a><br>
                <div class='inputs'>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='A'> A. Оксиды углерода </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='B'> B. Оксид азота </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='C'> C. Оксид серы  </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='D'> D. Пыль </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='E'> E. Металлы </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='F'> F. Углеводороды</label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='G'> G. Диоксид серы   </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='H'> H. Фтористые газы  </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='I'> I. Сероводород</label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='J'> J. Дурнопахнущие газы </label>
                </div>

                <a class=\"about-text2\" display=\"block\">14. Какие их перечисленных природных ресурсов относятся к неисчерпаемым?</a><br>
                <div class=\"inputs\">
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='A'> A. Солнечная энергия </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='B'> B. Растительный мир </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='C'> C. Полезные ископаемые  </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='D'> D. Энергия ветра </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='E'> E. Животный мир </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='F'> F. Энергия земных недр</label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='G'> G. Энергия морских приливов и волн    </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='H'> H. Плодородие почв  </label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='I'> I. Пресная вода</label><br>
                    <label><input type=\"checkbox\" name=\"tests[13][]\" value='J'> J. Воздух</label>
                </div>

                <a class=\"about-text2\" display=\"block\">15. Территориальная дифференциация городского ландшафта определяется как природными, так и антропогенными факторами. Город должен обеспечивать жилье, работу, образование, отдых, лечение, коммуникации для своих жителей. Какие 7 функциональныx зон выделяются в городском ландшафте?</a><br>
                <div class=\"inputs checkbox7\">
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='A'> A.	Селитебная</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='B'> B.	Административно-культурная</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='C'> C.	Охранная</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='D'> D.	Промышленная</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='E'> E.	Коммунально-складская</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='F'> F.	Транспортная</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='G'> G.	Рекреационная</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='H'> H.	Силовая</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='I'> I.	Зона энергоснабжения</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='J'> J.	Лечебно-оздоровительная</label>
                </div>

                <a class=\"about-text5\" display=\"block\">Часть 2</a><br>
                <a class=\"about-text3\" display=\"block\">Ответами к заданиям 16-20  являются последовательность цифр, букв, а также слова и словосочетания. Ответ запишите в поле без пробелов, запятых и других дополнительных символов.<br>Задания оцениваются в 2 балла.</a><br>

                <a class=\"about-text2\" display=\"block\">16.  Какая технология очистки загрязненных почв представлена на схеме? </a><br>
                <div class=\"inputs\">
                    <img src=\"./src/img/4var16.png\"><br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[15][]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">17.  Прочитайте текст. По представленным характеристикам определите субъект РФ и его соседей. Ответ представьте в виде перечислений словосочетаний через запятую.</a><br>
                <div class=\"inputs\">
                    <label>(А) – субъект РФ, имеющих четырех соседей. (Б) – восточный сосед занимает приморское географическое положение, но крупных морских портов не имеет. 
                    Тем не менее, в два его центра, расположенные в низовьях крупной реки, могут заходить морские суда. 
                    (В) – юго-восточный и (Г) – юго-западный соседи титульные субъекты РВ, народы которых относятся к одной языковой группе, но исповедуют разные религии. 
                    (Д) – западный сосед имеет уникальную минерально-сырьевую базу. На его территории разрабатывается как топливное, так и рудное сырьё, ведется его обогащение и передел.
                    </label>
                    <br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[16][]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">18. Прочитайте текст. Укажите местоположение описанной нефтяной катастрофы.</a><br>
                <div class=\"inputs\">
                    <label>«Эта катастрофа на сегодняшний день является самой большой загрязненной нефтью территорией суши и самым большим количеством нефти в мире. 
                    Несколько разливов нефти и аварий на трубопроводах и конвейерах являются причинами крупных разливов нефти. Всего в окружающую среду приходится поступление 15 300 000 тонн в год». 
                    </label><br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[17][]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">19. На схеме показан круговорот фосфора: черные стрелки – поступление растворимых фосфатов в тела растений, 
                циркуляция фосфора в живой природе и вымывание фосфора (пунктирные стрелки); оранжевые стрелки – поступление в среду части соединений фосфора в результате 
                горообразовательных процессов и последующего вымывания фосфора в почву в результате эрозии; красные стрелки – искусственный круговорот фосфора, созданный человеком. 
                Соотнесите ниже перечисленные термины со схемой. Ответ дайте в виде последовательности слов и словосочетаний через запятую.</a><br>
                <div class=\"inputs\">
                    <img src=\"./src/img/4var19.png\"><br><br>
                    <label>
                        A. Бактерии<br>B. Растворимые фосфаты<br>C. Нерастворимые фосфаты<br>D. Почвенные растворы<br>
                    </label><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[18][]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">20. Установите соответствие: фракция нефти – число атомов углерода. Ответ дайте в виде последовательности букв, без пробелов.</a><br>
                <div class=\"inputs\">
                    <label>
                        A. Мазут<br>B. Бензин<br>C. Керосин<br>D. Ректификационные газы<br>
                    </label><br>
                    <label>
                        1. 20+<br>2. 5-6<br>3. 10-15<br>4. 1-4<br>
                    </label><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[19][]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text5\" display=\"block\">Часть 3</a><br>
                <a class=\"about-text3\" display=\"block\">Задания 21-22 требуют развернутый ответ в виде 5-6 предложений.<br>Задания оцениваются в 3 балла.</a><br>

                <a class=\"about-text2\" display=\"block\">21.  Прочитайте текст и ознакомьтесь с картой. Какой природный фактор способствовал накоплению на дне озера углекислого газа? 
                Подробно распишите, какую  опасность представляет о. Киву и какие внешние факторы могут ей  способствовать? Предложите свои идеи для решения данной проблемы.?</a><br>
                <div class=\"inputs\">
                    <label>В октябре 1985 года под городом Уфа произошел взрыв двух поездов. Причиной тому стала утечка газа из трубопровода, в результате чего жидкий конденсат пропитывал почву и спускался по откосу к железной дороге. 
                    Образовалось «газовое озеро». 
                    При встрече двух поездов, возможно, в результате торможения, возникла искра, которая послужила причиной детонации газа и произошел мощнейший взрыв.
                    Похожее «газовое озеро» Киву (на дне которого скапливается газ), но больших масштабов, находится в  Африке  и представляет огромную опасность для жителей близлежащих поселений.
                    </label><br><br>
                    <img src=\"./src/img/4var21.png\"><br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[20][]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">22.  Какие последствия для растительного покрова несет нефтяное загрязнение?</a><br>
                <div class=\"inputs\">
                    <input type=\"text\" class= 'input_text' name=\"tests[21][]\" placeholder=\"Ответ\">
                </div>
                <br><br><br>

                <input type=\"submit\" class= 'test_finish' id=\"regbutton\" name=\"btn_submit_register\" value=\"Закончить тест\">
            </form>
        </section>
    </div>
";
$footer = file_get_contents((__DIR__) . '/footer.php');

echo $header . $mainPage . $footer;