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

                <a class=\"about-text2\" display=\"block\">1.	Какое из приведенных ниже веществ относится к взрывоопасным углеводородам?</a><br>
                <div class=\"inputs\">
                    <label><input type=\"radio\" name=\"tests[0][]\" value='A'> A. Метан</label><br>
                    <label><input type=\"radio\" name=\"tests[0][]\" value='B'> B. Этан</label><br>
                    <label><input type=\"radio\" name=\"tests[0][]\" value='C'> C. Пропан</label><br>
                    <label><input type=\"radio\" name=\"tests[0][]\" value='D'> D. Бутан</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">2.	Выберете верное определение термина «рекультивация».</a><br>
                <div class=\"inputs\">
                    <label><input type='radio' name='tests[1][]' value='B'> A. Вид деятельности по выявлению, анализу и учету прямых, косвенных и иных последствий воздействия на окружающую среду планируемой хозяйственной и иной деятельности в целях принятия решения о возможности или невозможности ее осуществления.</label><br>
                    <label><input type='radio' name='tests[1][]' value='B'> B. Повторное использование материальных ресурсов, позволяющее экономить сырье и энергию, и уменьшать образование отходов.</label><br>
                    <label><input type='radio' name='tests[1][]' value='C'> C. Комплекс мер по экологическому и экономическому восстановлению земель и водных ресурсов, плодородие которых в результате человеческой деятельности существенно снизилось.</label><br>
                    <label><input type='radio' name='tests[1][]' value='D'> D. Последовательная закономерная смена одного биологического сообщества (фитоценоза, микробного сообщества и т. д.) другим на определённом участке среды во времени в результате влияния природных факторов (в том числе внутренних сил) или воздействия человека.</label>
                </div>

                <a class=\"about-text2\" display=\"block\">3.	 В результате какой хозяйственной деятельности человека могут происходить техногенные землетрясения? Выберете несколько вариантов ответа.</a><br>
                <div class=\"inputs\">
                    <label><input type='checkbox' name='tests[2][]' value='A'> A. При строительстве водохранилищ</label><br>
                    <label><input type='checkbox' name='tests[2][]' value='B'> B. При ядерных взрывах</label><br>
                    <label><input type='checkbox' name='tests[2][]' value='C'> C. При строительстве высотных зданий и сооружений (высота более 75 м)</label><br>
                    <label><input type='checkbox' name='tests[2][]' value='D'> D. При осушении болот</label><br>
                    <label><input type='checkbox' name='tests[2][]' value='E'> E. При добыче нефти и газа</label><br>
                    <label><input type='checkbox' name='tests[2][]' value='F'> F. Деятельность человека не может вызвать землетрясения</label>
                </div>

                <a class=\"about-text2\" display=\"block\">4.   Какой из перечисленных вариантов шума является нормальным для человека?</a><br>
                <div class='inputs'>
                    <label><input type='radio' name=\"tests[3][]\" value='A'> A. 50 дБ</label><br>
                    <label><input type='radio' name=\"tests[3][]\" value='B'> B. 30-35 дБ</label><br>
                    <label><input type='radio' name=\"tests[3][]\" value='C'> C. 20 дБ</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">5. Продолжите высказывание.</a><br>
                <div class='inputs'>
                    <label>Механические нарушения почвенного покрова на всех объектах нефтяной и газовой отрасли связаны с …</label><br><br>
                    <label><input type='radio' name=\"tests[4][]\" value='A'> A. возведением буровых установок</label><br>
                    <label><input type='radio' name=\"tests[4][]\" value='B'> B. устьевым оборудованием</label><br>
                    <label><input type='radio' name=\"tests[4][]\" value='C'> C. прокладкой трубопроводов</label><br>
                    <label><input type='radio' name=\"tests[4][]\" value='D'> D. строительством промышленных корпусов, жилых поселков и коммуникаций</label><br>
                    <label><input type='radio' name=\"tests[4][]\" value='E'> E. снятием плодородного слоя</label><br>
                    <label><input type='radio' name=\"tests[4][]\" value='F'> F. засыпкой траншей</label><br>
                    <label><input type='radio' name=\"tests[4][]\" value='G'> G. планировкой амбаров</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">6. Прочитайте текст. Предположите о каком государстве идет речь. Выберите минеральные ресурсы, разрабатываемые на территории этого государства?</a><br>
                <div class='inputs'>
                    <label>Данное государство рассматривается западными политиками как очередной «символ зла». В настоящее время на него наложены экономические санкции со стороны многих развитых стран. 
                    В первую очередь они направлены против нефтяной отрасли, обеспечивающей большую часть экспорта страны.
                    </label><br><br>
                    <label><input type='checkbox' name=\"tests[5][]\" value='A'> A.	Магниевые руды</label><br>
                    <label><input type='checkbox' name=\"tests[5][]\" value='B'> B.	Свинцово-цинковые руды</label><br>
                    <label><input type='checkbox' name=\"tests[5][]\" value='C'> C.	Титановые руды</label><br>
                    <label><input type='checkbox' name=\"tests[5][]\" value='D'> D.	Железные руды</label><br>
                    <label><input type='checkbox' name=\"tests[5][]\" value='E'> E.	Калийные руды</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">7. Продолжите высказывание.</a><br>
                <div class='inputs'>
                    <label>В частной и муниципальной собственности могут находиться…</label><br><br>
                    <label><input type='radio' name=\"tests[6][]\" value='A'> A.	участки акватории суммарной площадью не более 3 квадратных км</label><br>
                    <label><input type='radio' name=\"tests[6][]\" value='B'> B.	участки реки протяженностью не более 2,5 км</label><br>
                    <label><input type='radio' name=\"tests[6][]\" value='C'> C.	пруд и обводненный карьер</label><br>
                    <label><input type='radio' name=\"tests[6][]\" value='D'> D.	обособленные водные объекты</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">8. Продолжите высказывание.</a><br>
                <div class='inputs'>
                    <label>К полномочиям Правительства РФ в сфере управления охраной окружающей среды не относится…</label><br><br>
                    <label><input type='radio' name=\"tests[7][]\" value='A'> A.	принятие мер по реализации прав граждан на благоприятную окружающую среду и экологическое благополучие</label><br>
                    <label><input type='radio' name=\"tests[7][]\" value='B'> B.	организация проведения государственной экологической экспертизы</label><br>
                    <label><input type='radio' name=\"tests[7][]\" value='C'> C.	обеспечение единой  государственной политики в области охраны окружающей среды и экологической безопасности</label><br>
                    <label><input type='radio' name=\"tests[7][]\" value='D'> D.	организация деятельности по охране и рациональному использованию природных ресурсов</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">9. Какие воздействия на окружающую среду вызывает планируемая хозяйственная или иная деятельность? Выберете один вариант ответа.</a><br>
                <div class='inputs'>
                    <label><input type='radio' name=\"tests[8][]\" value='A'> A.	прямое или косвенное</label><br>
                    <label><input type='radio' name=\"tests[8][]\" value='B'> B.	отрицательное или положительное</label><br>
                    <label><input type='radio' name=\"tests[8][]\" value='C'> C.	значительное негативное</label><br>
                    <label><input type='radio' name=\"tests[8][]\" value='D'> D.	негативное</label><br>
                </div>
                
                <a class=\"about-text2\" display=\"block\">10. Продолжите высказывание.</a><br>
                <div class='inputs'>
                    <label>Запрещается ввоз в РФ радиоактивных отходов из иностранных государств в целях…</label><br><br>
                    <label><input type='radio' name=\"tests[9][]\" value='A'> A.	хранения</label><br>
                    <label><input type='radio' name=\"tests[9][]\" value='B'> B.	захоронения</label><br>
                    <label><input type='radio' name=\"tests[9][]\" value='C'> C.	переработки</label><br>
                    <label><input type='radio' name=\"tests[9][]\" value='D'> D.	затопления</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">11. С какого возраста наступает уголовная ответственность за совершение экологических преступлений?</a><br>
                <div class='inputs'>
                    <label><input type='radio' name=\"tests[10][]\" value='A'> A.	С 16 лет</label><br>
                    <label><input type='radio' name=\"tests[10][]\" value='B'> B.	С 14 лет</label><br>
                    <label><input type='radio' name=\"tests[10][]\" value='C'> C.	С 18 лет</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">12. Что относится к наиболее токсичной части буровых отходов?</a><br>
                <div class='inputs'>
                    <label><input type='radio' name=\"tests[11][]\" value='A'> A.	Буровые растворы</label><br>
                    <label><input type='radio' name=\"tests[11][]\" value='B'> B.	Буровой шлам</label><br>
                    <label><input type='radio' name=\"tests[11][]\" value='C'> C.	Буровые сточные воды</label><br>
                    <label><input type='radio' name=\"tests[11][]\" value='D'> D.	Буровые отходы нетоксичны</label>
                </div>

                <a class=\"about-text2\" display=\"block\">13. Выберете НЕверные утверждения.</a><br>
                <div class='inputs'>
                    <label><input type='checkbox' name=\"tests[12][]\" value='A'> A.	Максимальная концентрация озона сосредоточена в тропосфере</label><br>
                    <label><input type='checkbox' name=\"tests[12][]\" value='B'> B.	Озоновый слой тоньше в полярных районах</label><br>
                    <label><input type='checkbox' name=\"tests[12][]\" value='C'> C.	Озоновый слой толще в экваториальных районах</label><br>
                </div>

                <a class=\"about-text2\" display=\"block\">14. Основными источниками загрязнения воздуха являются теплоэнергетика, черная и цветная металлургия, химическая промышленность, транспорт, нефте - и газопереработка.
                Какие из перечисленных источников загрязнения относятся к группе предприятий-загрязнителей:  нефтепереработка?
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

                <a class=\"about-text2\" display=\"block\">15. Какие 5 из перечисленных фактора относятся к антропогенным?</a><br>
                <div class=\"inputs checkbox5\">
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='A'> A.	Механические</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='B'> B.	Геологические</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='C'> C.	Геодезические </label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='D'> D.	Физические</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='E'> E.	Химические</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='F'> F.	Ландшафтные </label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='G'> G.	Биологические</label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='H'> H.	Метеорологические </label><br>
                    <label><input type=\"checkbox\" name=\"tests[14][]\" value='I'> I.	Гидрологические </label>
                </div>

                <a class=\"about-text5\" display=\"block\">Часть 2</a><br>
                <a class=\"about-text3\" display=\"block\">Ответами к заданиям 16-20  являются последовательность цифр, букв, а также слова и словосочетания. Ответ запишите в поле без пробелов, запятых и других дополнительных символов.<br>Задания оцениваются в 2 балла.</a><br>

                <a class=\"about-text2\" display=\"block\">16. Прочитайте текст. По описанию соседей определите приграничный субъект РФ.</a><br>
                <div class=\"inputs\">
                    <label>Северный сосед – субъект РФ, центр которого является третьим по численности населения городом нашей страны. На востоке находятся два соседа. 
                    Один из них известен тем, что здесь находятся два крупнейших разрабатываемых угольных бассейна России. 
                    Гидрологической жемчужиной другого соседа является озеро, названное русскими землепроходцами по тюркскому племени телесы, обитавшему на его берегах. 
                    С юга и запада этот субъект РФ выходит к границе с государством, на территории которого находится город, арендованный нашей страной до 2050 г. и наделенный статусом, 
                    соответствующим городу федерального значения РФ, с особым режимом безопасного функционирования объектов, предприятий и организаций, а также проживания граждан.
                    </label>
                    <br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[15]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">17.  Прочитайте текст. Назовите химический элемент, о котором идет речь.</a><br>
                <div class=\"inputs\">
                    <label>Водоток, получивший название «кровавый водопад», вытекает из небольшой трещины в роднике Тейлора. 
                    Он берёт начало из перекрытого льдом солёного озера, образовавшегося 1,5 млн лет назад. 
                    Вода источника имеет своеобразный кроваво-красный цвет благодаря этому химическому элементу.
                    </label><br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[16]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">18. Прочитайте текст. Назовите водный объект, в котором произошел разлив нефти.</a><br>
                <div class=\"inputs\">
                    <label>«Разлив нефти произошел 21 января 1991 года в Кувейте в результате второй войны в ___________________ между Ираком и Кувейтом. 
                    В качестве стратегического акта иракские солдаты открыли клапаны на нефтяном терминале Си-Айленда и позволили нефти из нескольких танкеров течь в ___________________. 
                    Иракские новости сообщают, что причиной авиакатастрофы стали воздушные удары США. Пять дней спустя воздушные удары США разрушили трубопроводы, чтобы предотвратить дальнейшие разливы нефти. 
                    К тому времени уже было разлито от 800 000 до 1 700 000 тонн сырой нефти.»
                    </label>
                    <br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[17]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">19. В левой части схемы представлен естественный механизм парникового эффекта. В правой части схемы представлен «вклад» человека в усиление парникового эффекта. Соотнесите   следующие элементы с пропусками на правой части схемы. Ответ дайте в виде последовательного перечисление элементов через запятую.</a><br>
                <div class=\"inputs\">
                    <img src=\"./src/img/3var19.png\"><br><br>
                    <label>
                        1. Фреоны<br>2. CH4<br>3. CO2<br>4. NO2<br>5. O3<br>
                    </label><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[18]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">20. Установите соответствие. Фракция нефти – применение. Ответ дайте в виде последовательности букв, без пробелов.</a><br>
                <div class=\"inputs\">
                    <label>
                        A. Мазут<br>B. Бензин<br>C. Керосин<br>D. Ректификационные газы<br>E. Лигроин<br>
                    </label><br>
                    <label>
                        1. Получение смазочных масел. Жидкое топливо    в    котельных установках<br>2. Топливо для двигателей внутреннего сгорания, растворитель.<br>3. Дизельное и реактивное топливо<br>4. Газообразное топливо<br>5. Керосин<br>6. Горючее для трактора<br>
                    </label><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[19]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text5\" display=\"block\">Часть 3</a><br>
                <a class=\"about-text3\" display=\"block\">Задания 21-22 требуют развернутый ответ в виде 5-6 предложений.<br>Задания оцениваются в 3 балла.</a><br>

                <a class=\"about-text2\" display=\"block\">21.  Опишите, какие процессы указаны на рисунке. Поясните на каких этапах нефтегазового производства возникают данные явления и какие существуют методы борьбы с ними?</a><br>
                <div class=\"inputs\">
                    <img src=\"./src/img/3var21.png\"><br><br>
                    <input type=\"text\" class= 'input_text' name=\"tests[20]\" placeholder=\"Ответ\">
                </div>

                <a class=\"about-text2\" display=\"block\">22.  Как нефть и нефтепродукты оказывают влияние на природные подземные воды?</a><br>
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
