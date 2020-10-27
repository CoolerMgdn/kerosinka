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

                <a class=\"about-text2\" display=\"block\">1.	Какие три из перечисленных загрязняющих веществ вызывают выпадение на землю кислотных дождей? </a><br>
                <div class=\"inputs checkbox3\">
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='A'> A. Оксид серы</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='B'> B. Диоксид серы</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='C'> C. Оксид озота</label><br>
                    <label><input type=\"checkbox\" name=\"tests[0][]\" value='D'> D. Сероводород</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">2.	Какое предприятие до конца 2013 года являлось основным загрязнителем озера Байкал?</a><br>
                <div class=\"inputs\">
                    <label><input type='radio' name='tests[1][]' value='B'> A. Горно-металлургический комбинат</label><br>
                    <label><input type='radio' name='tests[1][]' value='B'> B. Завод по производству пластмасс</label><br>
                    <label><input type='radio' name='tests[1][]' value='C'> C. Нефтеперерабатывающий завод</label><br>
                    <label><input type='radio' name='tests[1][]' value='D'> D. Целлюлозно-бумажный комбинат</label>
                </div>

                <a class=\"about-text2\" display=\"block\">3.	Ознакомьтесь с представленным ниже фото. В результате какой деятельности образовались провалы в Березниках и Соликамске?</a><br>
                <div class=\"inputs\">
                    <img src=\"./src/img/2var3.png\"><br><br>
                    <label><input type='radio' name='tests[2][]' value='A'> A. Добыча нефти и газа.</label><br>
                    <label><input type='radio' name='tests[2][]' value='B'> B. Строительство метрополитена.</label><br>
                    <label><input type='radio' name='tests[2][]' value='C'> C. Строительство большого количества зданий и сооружений.</label><br>
                    <label><input type='radio' name='tests[2][]' value='D'> D. Добыча магниевых и калийных солей.</label><br>
                    <label><input type='radio' name='tests[2][]' value='E'> E. Провалы имеют естественное, а не техногенное происхождение.</label>
                </div>

                <a class=\"about-text2\" display=\"block\">4.	Заполните пропуски.</a><br>
                <div class='inputs checkbox4'>
                    <label>Численность почвенных организмов (биотов) снижается из-за ______, ______, ___________ и __________.</label><br><br>
                    <label><input type='checkbox' name=\"tests[3][]\" value='A'> A. пестицидов</label><br>
                    <label><input type='checkbox' name=\"tests[3][]\" value='B'> B. органического загрязнения</label><br>
                    <label><input type='checkbox' name=\"tests[3][]\" value='C'> C. минерального загрязнения</label><br>
                    <label><input type='checkbox' name=\"tests[3][]\" value='D'> D. нарушения эксплуатации почвы</label><br>
                    <label><input type='checkbox' name=\"tests[3][]\" value='E'> E. смены климата</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">5.   Выберете правильное определение словосочетания «локализованные мероприятия». Локализованные мероприятия - это?</a><br>
                <div class=\"inputs\">
                    <label><input type='radio' name='tests[4][]' value='A'> A. Мероприятия по снижению уровня загрязнения до допустимого уровня и прекращение его дальнейшего распространения.</label><br>
                    <label><input type='radio' name='tests[4][]' value='B'> B. Комплекс мер по восстановлению химического состава грунтов и качества подземных вод до исходного состояния.</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">6. Какому из представленных ниже  полезному ископаемому принадлежит максимальная доля в производстве тепла и энергии  в топливно - энергетическом балансе ЮАР, Австралии, Польши, Китая?</a><br>
                <div class=\"inputs\">
                    <label><input type=\"radio\" name=\"tests[5][]\" value='A'> A.	Нефти</label><br>
                    <label><input type=\"radio\" name=\"tests[5][]\" value='B'> B.	Горючим сланцам</label><br>
                    <label><input type=\"radio\" name=\"tests[5][]\" value='C'> C.	Торфу</label><br>
                    <label><input type=\"radio\" name=\"tests[5][]\" value='D'> D.	Каменному углю</label><br>
                    <label><input type=\"radio\" name=\"tests[5][]\" value='E'> E.	Природному газу</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">7. Продолжите высказывание.</a><br>
                <div class=\"inputs\">
                    <label>Экологическое право регулирует общественные отношения в сфере…</label><br><br>
                    <label><input type='radio' name='tests[6][]' value='A'> A.	природопользования и охраны окружающей среды</label><br>
                    <label><input type='radio' name='tests[6][]' value='B'> B.	обеспечения экологической безопасности охраны окружающей среды и рационального природопользования</label><br>
                    <label><input type='radio' name='tests[6][]' value='C'> C.	природопользования, охраны окружающей среды и обеспечения экологической безопасности</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">8. Продолжите высказывание.</a><br>
                <div class=\"inputs\">
                    <label>Сохранение естественных экологических систем природных ландшафтов и природных комплексов является…</label><br><br>
                    <label><input type=\"radio\" name=\"tests[7][]\" value='A'> A. необходимым и обязательным</label><br>
                    <label><input type=\"radio\" name=\"tests[7][]\" value='B'> B. обязательным для хозяйствующих субъектов</label><br>
                    <label><input type=\"radio\" name=\"tests[7][]\" value='C'> C. приоритетным</label><br>
                    <label><input type=\"radio\" name=\"tests[7][]\" value='D'> D. актуальным</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">9. Заполните пропуск. </a><br>
                <div class=\"inputs\">
                    <label>Экологическая экспертиза проводится в целях установления соответствия документов и (или) документации ___________________________, обосновывающих планируемую хозяйственную и иную деятельность.</label><br><br>
                    <label><input type='radio' name='tests[8][]' value='A'> A.	нормативам качества окружающей среды</label><br>
                    <label><input type='radio' name='tests[8][]' value='B'> B.	требованиям в области обеспечения санитарно-эпидемиологического благополучия населения</label><br>
                    <label><input type='radio' name='tests[8][]' value='C'> C.	требованиям в области охраны окружающей среды</label><br>
                    <label><input type='radio' name='tests[8][]' value='D'> D.	нормативам допустимого воздействия на окружающую среду</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">10. Заполните пропуск.</a><br>
                <div class=\"inputs\">
                    <label>За нарушение законодательства в области охраны окружающей среды устанавливается _____________________ ответственность.</label><br><br>
                    <label><input type='radio' name='tests[9][]' value='A'> A.	гражданско-правовая и материальная</label><br>
                    <label><input type='radio' name='tests[9][]' value='B'> B.	имущественная, дисциплинарная, административная и уголовная</label><br>
                    <label><input type='radio' name='tests[9][]' value='C'> C.	административная и уголовная</label><br>
                    <label><input type='radio' name='tests[9][]' value='D'> D.	дисциплинарная, материальная, административная и уголовная</label>
                </div>

                <a class=\"about-text2\" display=\"block\">11.  Продолжите высказывание.</a><br>
                <div class=\"inputs\">
                    <label>Объектами экологического права являются…</label><br><br>
                    <label><input type='radio' name='tests[10][]' value='A'> A.	окружающая природа, ее объекты, ресурсы и комплексы, а также экологические права граждан и юридических лиц;</label><br>
                    <label><input type='radio' name='tests[10][]' value='B'> B.	совокупность норм права, которые регулируют отношения в области пользования и охраны природы и е ресурсов;</label><br>
                    <label><input type='radio' name='tests[10][]' value='C'> C.	взгляды и убеждения на практические проблемы правоприменения экологического законодательства.</label>
                </div>

                <a class=\"about-text2\" display=\"block\">12. Какие два из перечисленных варианта относятся к видам права природопользования?</a><br>
                <div class=\"inputs checkbox2\">
                    <label><input type='checkbox' name='tests[11][]' value='A'> A.  Право общего природопользования;</label><br>
                    <label><input type='checkbox' name='tests[11][]' value='B'> B.  Право индивидуального природопользования</label><br>
                    <label><input type='checkbox' name='tests[11][]' value='C'> C.	Право общественного природопользования;</label><br>
                    <label><input type='checkbox' name='tests[11][]' value='D'> D.  Право специального природопользования</label>
                </div>

                <a class=\"about-text2\" display=\"block\">13. Выберете основные причины химического загрязнение почв на объектах нефтегазовой отрасли на нефте- и газотранспортных предприятиях.</a><br>
                <div class=\"inputs\">
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='A'> A. разлив углеводородного конденсата </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='B'> B. влияние ингибиторов коррозии </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='C'> C. гидратообразование во время продувок и поршневании магистральных газопроводов  </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='D'> D. разлив турбинного топлива </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='E'> E. разлив метанола </label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='F'> F. разлив органических кислот</label><br>
                    <label><input type=\"checkbox\" name=\"tests[12][]\" value='G'> G. выбросы продуктов сгорания от топливоиспользующего оборудования</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">14. Основными источниками загрязнения воздуха являются теплоэнергетика, черная и цветная металлургия, химическая промышленность, транспорт, нефте - и газопереработка.
                Какие из перечисленных источников загрязнения относятся к группе предприятий-загрязнителей:  черная металлургия?
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

                <a class=\"about-text2\" display=\"block\">15. Какие из перечисленных природных ресурсов относятся к исчерпаемым –невозобновляемым?</a><br>
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
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='J'> J. Воздух</label>
                </div>

                <a class=\"about-text5\" display=\"block\">Часть 2</a><br>
                <a class=\"about-text3\" display=\"block\">Ответами к заданиям 16-20  являются последовательность цифр, букв, а также слова и словосочетания. Ответ запишите в поле без пробелов, запятых и других дополнительных символов.<br>Задания оцениваются в 2 балла.</a><br>

                <a class=\"about-text2\" display=\"block\">16. Прочитайте текст. Назовите посёлок, о котором идёт речь.</a><br>
                <div class=\"inputs\">
                    <label>Вахтовый посёлок, где начинается холодная Арктика и кипит жаркая работа. По переписи 2002 года население посёлка составляло около 19 человек, на данный момент – 22000. 
                    Прирост населения связан с развитием проекта по производству СПГ. На территории посёлка находятся одноименный международный аэропорт и порт.</label>
                    <br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[15]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">17. Перечислите не менее 5 объектов производственного экологического контроля? Дайте развернутый ответ в виде 5-6 предложений.</a><br>
                <div class=\"inputs\">
                    <input type=\"text\" class= 'input_text' name=\"tests[16]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">18. Прочитайте текст и заполните пропуск. Укажите аварию и ее территориальное расположение. </a><br>
                <div class=\"inputs\">
                    <label>«_________________________________  20 апреля 2010 года был вызван утечкой природного газа, что в итоге привело к взрыву, в результате которого одиннадцать человек погибли. 
                    Платформа затонула через два дня. После того, как приблизительно 672 000 тонн достигли моря, разлив нефти был остановлен 16 июля 2010 года.</label>
                    <br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[17]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">19. Установите соответствия. Ответ дайте в виде последовательности слов, разделяя  пробелами.</a><br>
                <div class=\"inputs\">
                    <label>Грузооборот морских портов России в 2010 г. составлял 525,85 млн т, в т.ч. сухих грузов – 211,5 млн т, а наливных – 314,35 млн т. 
                        Среди сухих грузов в структуре грузооборота преобладает (А),  а среди наливных грузов – (Б). Российские порты ориентированы на экспорт грузов, которые в 11 раз больше импорта. 
                        Среди портов балтийского бассейна крупнейшим по грузообороту является Большой порт (В), среди портов Черноморско-Азовского бассейна (Г), а среди портов Дальнего Востока – (Д). 
                    </label><br><br>
                    <label>
                        1. Ванино<br>2. Нефть<br>3. Санкт-Петербург<br>4. Уголь<br>5. Новороссийск<br>
                    </label><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[18]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">20. Установите соответствие. Ответ дайте в виде последовательности букв, без пробелов.</a><br>
                <div class=\"inputs\">
                    <label>
                        A. Легкие продукты перегонки сырой нефти<br>B. Продукты крекинга<br>C. Продукты природных видоизменений нефти<br>
                    </label><br>
                    <label>
                        1. Нефтяной газ<br>2. Эфир петролейный<br>3. Бензин<br>4. Лигроин<br>5. Керосин<br>6. Газойль<br>7. Соляр<br>8. Бензол<br>9. Толуол<br>10. Озокерит<br>
                    </label><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[19]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text5\" display=\"block\">Часть 3</a><br>
                <a class=\"about-text3\" display=\"block\">Задания 21-22 требуют развернутый ответ в виде 5-6 предложений.<br>Задания оцениваются в 3 балла.</a><br>

                <a class=\"about-text2\" display=\"block\">21.  Прочитайте ниже приведенный текст. Как предотвратить появление травящих скважин? Как узнавать о появлении травящих скважин? Как ликвидировать утечку газа и ее последствия для окружающей среды?</a><br>
                <div class=\"inputs\">
                    <label>Некоторые способы добычи нефти (зачастую самые эффективные) приводят к образованию трещин в горной породе из которой добывается нефть или газ. 
                    Случается, что некоторые трещины выходят на поверхность и из нее начинает выделяться газ. Такое явление называется «травящая скважина». Это может быть причиной образования «газовых озер» и создавать взрывоопасные ситуации. </label><br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[20]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">22.  Как нефть и нефтепродукты оказывают влияние на природные почвенно-грунтовые воды?</a><br>
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
