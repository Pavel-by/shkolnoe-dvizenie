<!DOCTYPE html>
<html>

<head>
    <title>Реквизиты | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
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
                            <h1 class="page-title">Наши реквизиты</h1>
                            <div class="card">
                                <p><b>ИНН</b> 2204058193<br><b>КПП</b> 220401001<br><b>Расчетный счет</b> 40702810302000002425<br> Алтайское отделение №8644 ПАО Сбербанк<br><b>БИК</b> 040173604<br><b>корсчет</b> 30101810200000000604 
                                    <br/><br/>
                                    <b>Получатель платежа:</b><br> ООО «КФ Энергия центр»<br>
                                    <b>Назначение платежа:</b><br> Участие в конкурсе</p>
                            </div>
                            <h2>Внимание!</h2>
                            <p>Плательщикам иностранных граждан (Белоруссия, Монголия, Казахстан) просим в платежных документах код валютной операции указывать 20100!!!</p>
                            <div class="important-text"><p>Данные реквизиты, во избежание ошибок, лучше распечатать</p>
                                <div class="download">
                                    <a href="files/Реквизиты.docx">Реквизиты.docx</a>
                                </div>
                            </div>
                            <p>Денежный перевод можно сделать через любое отделение Сбербанка, Коммерческого банка или Почты России.</p>
                        </div>
                </div>
            </div>
        </div>
        <?php
        include("footer.html");
    ?>
</body>

</html>