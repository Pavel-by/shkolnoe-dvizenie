<?php
    include('scripts/check-autorization.php');
    include('scripts/update-userinfo.php');
    include('system/constants.php');
    require_once 'scripts/error-script.php';
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Скачать задания | Личный кабинет | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="style.css?date=<?php echo filemtime("styles/style.css"); ?>">
        <script type="text/javascript" src="scripts/jquery.js"></script>
        <script type="text/javascript" src="/module/message.js"></script>
        <link rel="shortcut icon" href="images/favicon.ico">
    </head>

    <body>
        <?php
        include("header.html");
    ?>
            <div class="content">
                <div class="limit-block">
                    <div class="flex-block flex-column flex-top flex-left">
                        <?php
                        include("user-menu.html")
                    ?>
                            <div>
                                <h1 class="page-title">Скачать задания</h1>
                                <?php
                                    if (constants::PAYMENT_FOR_DOWNLOAD and (!isset($_SESSION['usertype']) or $_SESSION['usertype'] != 1)){
                                        echo "<p class='important-text'>Прежде чем скачать задания, Вам необходимо <a href='user-payment.php'>загрузить</a> квитанцию об оплате. Она будет проверена в ручном режиме и в течение суток Вам откроют доступ к данному разделу.</p>";
                                    }
                                    else {
                                        if ($link){
                                            $userkey = $_SESSION['userkey'];
                                            $rez = mysqli_query($link, "SELECT `classes` FROM `users` WHERE `userkey`='$userkey'");
                                            if ($rez and $rez = mysqli_fetch_array($rez)){
                                                echo "<div class='download'><img src='images/download.png'><a href='/files/answer_form.rar'>Скачать бланк ответов</a></div>";
                                                echo "<div class='download'><img src='images/download.png'><a href='scripts/get-question-archive.php'>Скачать задания</a></div>";
                                            } else{
                                                log::e('SQL: ' . mysqli_error($link));
                                                echo "Ошибка подключения к базе данных. Пожалуйста, попробуйте позже.";
                                            }
                                        }   
                                        else {
                                            log::e('SQL CONNECTION ERROR');
                                            echo "Ошибка подключения к базе данных. Пожалуйста, попробуйте позже.";
                                        }
                                    }
                                ?>
                            </div>
                    </div>
                </div>
            </div>
            <?php
        include("footer.html");
    ?>
    </body>

    </html>