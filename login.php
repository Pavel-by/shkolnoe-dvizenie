<?php
    session_start();
    if (isset($_GET['next'])) {
        $next = $_GET['next'];
    }
    if (isset($_SESSION['usertype'])){
        if (isset($next)) {
            header("Location:http://" . $_SERVER['HTTP_HOST'] . "/$next");
        }
        else if ($_SESSION['usertype'] == 2){
            header("Location:http://" . $_SERVER['HTTP_HOST'] . "/admin-add-permit.php");
        }
        else{
            header('Location:http://' . $_SERVER['HTTP_HOST'] . '/user-info.php');
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Вход | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css?date=<?php echo filemtime("styles/style.css"); ?>">
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="/module/message.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
    <script type="text/javascript">
        
        document.addEventListener('DOMContentLoaded', function() {
            var formError = $('#form-error');
            var email = $('input[name=email]');
            var password = $('input[name=password]');
            var href = <?php echo isset($_GET['next']) ? '"' . $_GET['next'] . '";' : 'null;' ?>

            formError.hide();

            document.getElementById('register-form').addEventListener('submit', function(e) {
                e.preventDefault();

                var data = $('#register-form').serialize();
                var Wait = Message.create({header: "Загрузка", text: "Проверка данных", closeable: false});
                $.ajax({
                    url: 'scripts/check-login.php',
                    data: data,
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(d) {
                        Wait.hide();
                        if (d.error) {
                            formError.html(d.texterror);
                            formError.show();
                        }
                        else{
                            if (href != null){
                                location.replace(href);
                            }
                            else if (d.href != null)
                                location.replace(d.href);
                            formError.hide();
                        }
                    },
                    error: function(d) {
                        Wait.hide();
                        Message.create({header: "Ошибка", text: "Ошибка при обработке данных на сервере"});
                    }
                });
            });
        });
    </script>
</head>

<body>
    <?php
        include('header.html');
    ?>
    <div class="content">
        <div class="center limit-block">
            <form id="register-form" class="left" style="display: inline-block; width: 400px; max-width: 100%; padding-top: 100px;">
                <h2>Вход</h2>
                <div>
                    <input type="text" placeholder="E-mail" name="email" class="text-input" autocomplete="off" autocorrect="off">
                    <span class="input-error"></span>
                </div>
                <div>
                    <input type="password" placeholder="Пароль" name="password" class="text-input">
                    <span class="input-error"></span>
                </div>
                <span class="input-error" id="form-error">Присутствуют ошибки при заполнении полей</span>
                <input type="submit" class="submit-button" value="Войти">
                <p class="left">Еще не зарегистрированы? <a href="registration.php">Зарегистрироваться</a></p>
            </form>
        </div>
    </div>
    <?php
        include("footer.html");
    ?>
</body>

</html>