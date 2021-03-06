<!DOCTYPE html>
<html>

<head>
    <title>Критерии | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
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
                            <h1 class="page-title">Критерии</h1>
                            <p>Сертификат выдается каждому участнику, независимо от набранных баллов</p>
                            <h2>Распределение дипломов:</h2>
                            <ul class="content-ul">
                                <li>15 баллов – Диплом 1 степени</li>
                                <li>14 баллов – Диплом 2 степени</li>
                                <li>13 баллов – Диплом 3 степени</li>
                            </ul>

                        </div>
                </div>
            </div>
        </div>
        <?php
        include("footer.html");
    ?>
</body>

</html>