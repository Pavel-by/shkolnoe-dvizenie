<!DOCTYPE html>
<html>

<head>
    <title>Оплата | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
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
                            <h1 class="page-title">Оплата участия</h1>
                            <h3>Оплатить участие вы можете любым удобным для вас способом:</h3>
                                    <div class="card">       
                                        <p class="bold">Через банк.</p>
                                        <ol class="content-ul">
                                            <li><a href="files/kvitancia.docx">Скачайте</a> 
                                                и распечатайте квитанцию.</li>
                                            <li>В разделе "Оплата" выбираете файл и загружаете 
                                                сканированную копию чека. Только
                                                после этого заявка будет отправлена!</li>
                                        </ol>
                                    </div>
                                    <div class="card">
                                        <p class="bold">На банковскую карту:</p>
                                        <table class="content-table">
                                            <tr>
                                                <td>
                                                    <p><img src="images/vtb.jpg" class="inline-block" style="height: 24px;">  
                                                        <span style="color: rgb(3, 3, 129);">Банк ВТБ</span> MasterCard <b>5278 8300 2714 0569</b></p>
                                                </td>
                                                <td>
                                                    <p><img src="images/sberbank.png" class="inline-block" style="height: 24px;">  
                                                        <span style="color: green">СБЕРБАНК</span> 
                                                        VISA <b>4276 8020 1818 0123</b></p>
                                                </td>
                                            </tr>
                                        </table>
                                        <p><b>Назначение платежа (в комментарии)</b>:  Регистрационный 
                                            взнос за участие в дистанционном мероприятии </p>
                                        <p>В качестве доказательства оплаты можно сделать скриншот 
                                            страницы банковской системы платежа и прикрепить в личном кабинете 
                                            в разделе <a href="user-payment.php">оплата</a>.</p>
                                    </div>
                                </li>
                                <div class="card">
                                    <p>Оплатить онлайн иными способами. Для этого сделайте запрос реквизитов 
                                    на адрес тех. 
                                    поддержки сайта <b>help@shkolnoe-dvizenie.ru</b></p>
                                </div>
                            <div>
                                <div class="download">
                                    <img src="images/download.png">
                                    <a href="files/kvitancia.docx">Скачать квитанцию</a>
                                </div>
                            </div>
                            <p class="important-text"><span class="red bold">Внимание!</span><br> Плательщикам 
                                иностранных 
                                граждан (Белоруссия, Монголия, Казахстан) просим в платежных документах код 
                                валютной операции 
                                указывать 20100!!!</p>
                            <p class="important-text">От уплаты организационного взноса <b>освобождаются</b> 
                                участники 
                                конкурса из детских домов, дети-инвалиды (при официальном запросе от учреждения). 
                                В кнопку ВЫБРАТЬ ФАЙЛ в разделе личного кабинета Оплата помещаете
                                сканированную копию любого документа подтверждающего принадлежность к  льготной 
                                группе участников.</p>
                        </div>
                </div>
            </div>
        </div>
        <?php
        include("footer.html");
    ?>
</body>

</html>