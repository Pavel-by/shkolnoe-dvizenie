<!DOCTYPE html>
<html>

<head>
    <title>Призы и подарки | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css?date=<?php echo filemtime("styles/style.css"); ?>">
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <?php
        include("header.html");
    ?>
        <div class="content">
            <div class="limit-block">
                <div class="flex-block flex-row flex-top flex-left">
                    <?php
                        include("information-menu.html")
                    ?>
                        <div>
                            <h1 class="page-title">Призы и подарки</h1>
                            <ol class="content-ul">
                                <li><b>Портфолио – «Покажи все, на что ты способен!»</b><br> Всем участникам, без ограничения, предоставляется Сертификат участника конкурса «Школьное движение».</li>
                                <li><b>Что такое портфолио? </b><br> Портфолио – это «индивидуальный портфель» образовательных достижений: результаты Конкурсов различного уровня, интересные самостоятельные проекты и творческие работы.</li>
                                <li><b>Учителя</b>, задействованные в подготовке и проведении конкурса, получат Благодарственные грамоты.</li>
                                <li><b>Школы</b>, представившие к участию более 15-ти человек, получат Благодарственные письма.</li>
                            </ol>
                            <p>Среди финалистов первых мест путем простой случайной выборки будут определены призеры конкурса, которым будут отправлены подарки: Планшеты и  Медали. Десять школ с наиболее высоким рейтингом (по количеству баллов своих учащихся) получат главный приз Конкурса - Кубок Победителя.</p>
                            <p>Грамоты рассылаются отдельно от Сертификатов в течение 20-ти дней после подведения итогов Конкурса.</p>
                            <p>C уважением, администраторы сайта.</p>
                            <div class="center">
                                <img src="images/prizes-cup.jpg" style="max-width: 100%;">
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <?php
        include("footer.html");
    ?>
</body>

</html>