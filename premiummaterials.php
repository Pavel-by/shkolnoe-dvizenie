<!DOCTYPE html>
<html>

<head>
    <title>Наградные материалы | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css?date=<?php echo filemtime("styles/style.css"); ?>">
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
    <?php
        echo include("scripts/img-watcher.php");
    ?>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                allImages = document.getElementsByTagName('img');
                images = new Array();
                groupName = "sertificate";
                for (var i = 0; i < allImages.length; i++) {
                    var image = allImages[i];
                    if (image.getAttribute("group") == groupName) {
                        images.push(image.src.replace("/small", ''));
                        image.addEventListener("click", function() {
                            CreateImageWatcher(images, parseInt(this.getAttribute("indexInGroup")));
                        });
                    }
                }
            });
        </script>
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
                            <h1 class="page-title">Наградные материалы</h1>
                            <p class="quote"><i>Ученикам, чтобы преуспеть, надо догонять тех, кто впереди, и не ждать тех, кто позади.</i><br> Аристотель</p>
                            <h2>Приветствуем Вас, дорогие гости и участники нашего проекта!</h2>
                            <p>На этой страничке Вы можете ознакомиться с НАГРАДНЫМИ МАТЕРИАЛАМИ конкурса «Школьное движение».</p>
                            <table class="content-images-table">
                                <tr>
                                    <td><img src="/images/examples/small/1.jpg" group="sertificate" indexInGroup='0'></td>
                                    <td><img src="/images/examples/small/2.jpg" group="sertificate" indexInGroup='1'></td>
                                    <td><img src="/images/examples/small/3.jpg" group="sertificate" indexInGroup='2'></td>
                                </tr>
                                <tr>
                                    <td><img src="/images/examples/small/7.jpg" group="sertificate" indexInGroup='3'></td>
                                    <td><img src="/images/examples/small/5.jpg" group="sertificate" indexInGroup='4'></td>
                                    <td><img src="/images/examples/small/6.jpg" group="sertificate" indexInGroup='5'></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="width: 100%; text-align: center;"><img style="width: auto; height: 130px;" src="/images/examples/small/4.jpg" group="sertificate" indexInGroup='6'></td>
                                </tr>
                            </table>
                            <p>Наградные материалы заполняются <b>на месте организаторами конкурса самостоятельно</b>, во избежание недоразумений.</p>
                            <p>Бланки наградных материалов выкладываются в Личные кабинеты сразу после подведения итогов в шаге 6.</p>
                            <p class="important-text">Обратите внимание: льготной группе участников наградной материал высылается ТОЛЬКО в электронном варианте.</p>
                            <p>Грамоты рассылаются отдельно от Сертификатов в течение 20-ти дней после подведения итогов конкурса.</p>
                            <p>C уважением, администраторы сайта.</p>

                        </div>
                </div>
            </div>
        </div>
        <?php
        include("footer.html");
    ?>
</body>

</html>