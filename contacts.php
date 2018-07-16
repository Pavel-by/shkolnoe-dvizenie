<!DOCTYPE html>
<html>

<head>
    <title>Контакты | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
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
                            <h1 class="page-title">Наши контакты</h1>
                            <p class="bold">Наш почтовый адрес:</p>
                            <p class="form-hint">659321, Алтайский край, г.Бийск, а/я 89</p>
                            <divider></divider>

                            <p class="bold">Телефон службы поддержки:</p>
                            <p class="form-hint">+7 (923) 00 483 02<br>+7 (903) 949 55 41</p>
                            <divider></divider>

                            <p class="bold">Наш сайт в интернете:</p>
                            <p class="form-hint"><a href="http://shkolnoe-dvizenie.ru/">http://shkolnoe-dvizenie.ru/</a></p>
                            <divider></divider>
                            
                            <p class="bold">E-mail поддержки:</p>
                            <p class="form-hint">help@shkolnoe-dvizenie.ru</p>
                            <divider></divider>

                            <p class="bold">Мы в социальных сетях:</p>
                            <p>
                                <a class="share" href="https://www.facebook.com/Школьное-движение-926602540835913" title="Facebook">
                                    <img src="http://shkolnoe-dvizenie.ru/images/facebook-icon.png" alt="facebook">
                                </a>
                                <a class="share" href="https://vk.com/shkolnoe_dvizenie" title="ВКонтакте">
                                    <img src="http://shkolnoe-dvizenie.ru/images/vk-icon.png" alt="VK">
                                </a>
                                <a class="share" href="https://www.ok.ru/group/53685997994129" title="Одноклассники">
                                    <img src="http://shkolnoe-dvizenie.ru/images/odnoklassniki-icon.png" alt="Odnoklassniki">
                                </a>                        
                            </p>

                        </div>
                </div>
            </div>
        </div>
        <?php
        include("footer.html");
    ?>
</body>

</html>