<!DOCTYPE html>
<html lang="en">
<!-- by Sadykov Kamil (vk.com/coolermgdn) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>«Керосинка»</title>
    <link rel="shortcut icon" href="./src/img/logo.png" type="image/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
    <link rel="stylesheet" href="./src/style/main.css">
</head>
<body>
    <!-- Шапка -->
    <?php
        include('nav-home.php');
    ?>

    <!-- РГУНГ -->
    <section id="section00"> </section>

    <!-- Основной текст про олимпиаду -->
    <div class="container">
        <section id="section01">
          <h2 class="about-text">Приглашаем обучающихся 9-11 классов средних образовательных учреждений принять участие в Междисциплинарной олимпиаде школьников «Керосинка»</h2>
          <div class="about-image">
            <div class="image1"> 
              <img src="./src/img/logo.png">
            </div>
          </div>
          <a class="about-text1">Организатором Олимпиады является: федеральное государственное автономное образовательное учреждение высшего образования «Российский государственный университет нефти и газа (национальный исследовательский университет) имени И.М. Губкина»</a>
          <a class="about-text2">Цель Олимпиады: выявление и развитие у учащихся, осваивающих общеобразовательные программы основного общего и среднего общего образования, творческих способностей и интереса к научно-исследовательской деятельности.</a><br><br>
          <a class="about-text about-text-line">Важные даты</a><br>
          <a class="about-text4">... – окончание приема заявок на участие <br> ... – проведение отборочного этапа <br> ... – объявление результатов отборочного этапа <br> ... – проведение заключительного этапа»</a><br><br>
          <a class="about-text about-text-line">Условия проведения</a><br>
          <a class="about-text2">Участие в Олимпиаде индивидуальное. Для участия в олимпиаде необходимо до ... включительно пройти регистрацию на сайте.</a>
          <a class="about-text3">Участие в олимпиаде бесплатное.</a>
      </section>
    </div>

    <!-- Информация по этапам олимпиады -->
	<div class="container">
        <section id="section02"> 
			<section id="cd-timeline" class="cd-container">
		        <!-- Отборочный этап -->
			    <div class="cd-timeline-block">
				    <div class="cd-timeline-img cd-picture">
					    <img src="./src/img/oil-and-gas-fire.png"  alt="Picture">
				    </div> <!-- cd-timeline-img -->
				    <div class="cd-timeline-content">
					    <h2>Отборочный этап</h2>
                        <p>Отборочный этап олимпиады пройдет в online. Длительность Олимпиады – 45 минут.</p>
                        <a href="questions.php" class="cd-read-more">Подробнее</a>
                        <span class="cd-date" id="olimpdate">Май</span>
				    </div> <!-- cd-timeline-content -->
			    </div> <!-- cd-timeline-block -->
		        <!-- Заключительный этап -->
			    <div class="cd-timeline-block">
				    <div class="cd-timeline-img cd-movie">
					    <img src="./src/img/drill-clipart-cement-worker-20.png" alt="Movie">
				    </div> <!-- cd-timeline-img -->
				    <div class="cd-timeline-content">
					    <h2>Заключительный этап</h2>
					    <p>Заключительный этап олимпиады будет проходить на базе Российского государственного университета нефти и газа (НИУ) имени И.М. Губкина.</p>
					    <a href="questions.php" class="cd-read-more">Подробнее</a>
					    <span class="cd-date" id="olimpdate">Сентябрь</span>
				    </div> <!-- cd-timeline-content -->
			    </div> <!-- cd-timeline-block -->
		    </section> <!-- cd-timeline -->
        </section>
    </div>
    
    <!-- Тематика задач и оргкомитет -->
    <div class="container">
         <section id="section03">
            <a class="about-text about-text-line">Тематика задач</a><br>
            <a class="about-text2"> •	Загрязнение атмосферы.<br><br>•	Современные изменения природы и климата из-за загрязнения выбросами нефтегазовых промышленных предприятий.<br><br>•	Химическое и радиоактивное загрязнение почв, пород, поверхностных и подземных вод, возникновение и развитие опасных техноприродных процессов, сокращение ресурсов подземных вод.<br><br>•	Характеристика, оценка состояния и управление современными ландшафтами.<br><br>•	Рекультивация земель, ресурсосбережение и утилизация отходов.<br><br>•	Геоэкологический мониторинг и обеспечение экологической безопасности.<br><br>•	Мероприятия по снижению последствий катастрофических процессов вследствии воздействия различных направлений нефтегазовой  отрасли (Добыча и разработка, транспортировка, химическая промышленность, НПЗ и другие)<br><br>•	 Защиты, восстановление и управления природно-техническими системами.<br><br>•	Локализация и ликвидация негативных природных и техногенных воздействий на окружающую среду.<br><br>•	Методы и технические средства оперативного обнаружения, анализа причин и прогноза последствий чрезвычайных ситуаций, угрожающих экологической безопасности.</a>
            <h5 class="about-text1">Подробная информация о сроках, порядке проведения, критериях оценки и итогах Олимпиады представлена в <a id='docref1' target="_blank" href="documents/Polozhenie_ob_olimpiade.docx">Положении о проведении Междисциплинарной олимпиады школьников «Керосинка»</a></h5><br><br><br>
            <a class="about-text about-text-line">Оргкомитет Олимпиады</a><br>
            <!-- Контейнер с оргкомитетом (flex) -->
            <div class="section03-orgcomitet">
                <div class="section03-orgcomitet-row">
                    <img src="./src/img/Martynov_V_G.jpg" alt="Мартынов Виктор Георгиевич">
                    <p class="about-text2">
                        <a id='orgref'>Мартынов Виктор Георгиевич</a><br><br>Ректор РГУ нефти и газа (НИУ) имени И.М. Губкина, профессор, член-корреспондент РАО<br>
                    </p>
                </div>
                <div class="section03-orgcomitet-row">
                    <img src="./src/img/Maximenko_A_F.jpg" alt="Максименко Александр Фёдорович">
                    <p class="about-text2">
                        <a id='orgref'>Максименко Александр Фёдорович</a><br><br>Проректор по научной и международной работе<br>
                    </p>
                </div>
                <div class="section03-orgcomitet-row">
                    <img src="./src/img/Fatkhutdinov_R_R.jpg" alt="Фатхутдинов Руслан Рустамович">
                    <p class="about-text2">
                        <a id='orgref'>Фатхутдинов Руслан Рустамович</a><br><br>Председатель молодежного совета нефтегазовой отрасли Российской Федерации<br>
                    </p>
                </div>
                <div class="section03-orgcomitet-row">
                    <img src="./src/img/Lobzhanidze_N_E.jpg" alt="Лобжанидзе Наталья Евгеньевна">
                    <p class="about-text2">
                        <a id='orgref'>Лобжанидзе Наталья Евгеньевна</a><br><br>Заместитель заведующего кафедрой геоэкологии, доцент<br>
                    </p>
                </div>
                <div class="section03-orgcomitet-row">
                    <img src="./src/img/Oleynikova_D_A.jpg" alt="Олейникова Дарья Алексеевна">
                    <p class="about-text2">
                        <a id='orgref'>Олейникова Дарья Алексеевна</a><br><br>Председатель студенческого научного общества<br>
                    </p>
                </div>
                <div class="section03-orgcomitet-row">
                    <img src="./src/img/Krasikova_M_Y.jpg" alt="Красикова Маргарита Юрьевна">
                    <p class="about-text2">
                        <a id='orgref'>Красикова Маргарита Юрьевна</a><br><br>Ответственная за волонтёрское направление<br>
                    </p>
                </div>
            </div>
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