<?php
require('header.php');

$header = "
    <!DOCTYPE html>
    <html lang=\"en\">
    <!-- by Sadykov Kamil (Kamil.sadykov@mail.ru) -->
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Нормативные документы</title>
    " . $header;

$mainPage = "
    <!-- РГУНГ -->
    <section id=\"section00\"> </section>

    <!-- Нормативные документы -->
    <div class=\"container\">
        <section id=\"section-doc\">
          <a class=\"about-text\">Нормативные документы</a><br>
          <p class=\"about-text2\"><a id='docref1' target=\"_blank\" href=\"documents/Polozhenie_ob_olimpiade.pdf\">1. Положение о проведении Междисциплинарной олимпиады школьников «Керосинка»</a><br><br><a id='docref1' target=\"_blank\" href=\"documents/Politica_confidecialnosti.pdf\">2. Политика конфиденциальности</a></p>
        </section>
    </div>
";
$footer = file_get_contents((__DIR__) . '/footer.php');

echo $header . $mainPage . $footer;
