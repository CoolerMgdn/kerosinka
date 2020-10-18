<section id="section04">
    <form class="formfooter">
        <div class="a-footer__col">
            <p class="about-text_ftitle"> Контакты: </p>
            <h5 class="about-text_f"><br><A href="tel:+79806813901">+7 (980) 681-39-01</A><br><br><A href="tel:+79855871584">+7 (985) 587-15-84</A><br><br></h5>
        </div>
        <div class="a-footer__col">
            <p class="about-text_ftitle"> E-mail:  </p>
            <h5 class="about-text_f"><br><A href="mailto: olympigubkin@mail.ru">olympigubkin@mail.ru</A><br><br></h5>
            </div>
        <div class="a-footer__col">
            <p class="about-text_ftitle"> Наши ссылки: </p>
            <h5 class="about-text_f"><br><A href="https://www.gubkin.ru">https://www.gubkin.ru</A><br><br><A href="https://vk.com/snorgu">https://vk.com/snorgu</A><br><br><A href="https://vk.com/neftgas2020">https://vk.com/neftgas2020</A><br><br><br><br></h5>
        </div>
        <div class="a-footer__year">
            <h5 class="about-text_ftitle">Москва, 2020 г</h5><br>
        </div>
    </form>
</section>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://github.com/simplefocus/FlowType.JS/blob/master/flowtype.js'></script>
<script src="./src/js/jquery.maskedinput.min.js"></script>
<script>
    $(document).ready(function() {
        /*добавляем маску к input с ID = phone*/
        $("#phone").mask("+7 (999) 999-99-99");
        $("#birdth").mask("99.99.9999");
        $("#zip_index").mask("999999");
    })
</script>
<script src="./src/js/script.js"></script>
</body>
<!-- by Sadykov Kamil (Kamil.sadykov@mail.ru) -->
</html>
