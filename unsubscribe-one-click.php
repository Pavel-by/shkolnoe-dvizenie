<!DOCTYPE html>
<html>
    <head>
        <title>Отписаться</title>
        <meta charset="utf-8">
        <style type="text/css">
            * {
                text-align: left;
            }
            input {
                margin: 10px;
            }
            .card {
                padding: 20px;
                background-color: white;
                border: 0px solid #ACACAC;
                border-radius: 4px;
                width: calc(100% - 40px);
                margin: 10px;
                margin-bottom: 20px;
                margin-top: 20px;
                box-shadow: 1px 1px 8px rgb(180, 180, 180);
            }
        </style>
    </head>
    <body style='text-align: left; width: 100%; max-width: 600px; margin: auto;'>
        <div class="card">
            <h1 style="color: #CC6A00">Конкурс "Школьное движение"</h1>
            <?php
                if (isset($_GET['email'])){
                    include_once 'system/db.php';
                    require_once('scripts/error-script.php');
                    $date = date("Y-m-d H:i:s");
                    $email = mysqli_real_escape_string($link, $_GET['email']);
                    if ($link){
                        $rez = mysqli_query($link, "INSERT IGNORE INTO `unsubscribed`(`email`, `date`) VALUES('$email', '$date')");
                        if (!$rez){
                            log::e(mysqli_error($link));
                            $file = fopen('unsubscribed.txt');
                            fwrite($file, $email . " " . $date . "\n");
                            fclose($file);
                        }
                    }
                    else{                    
                        $file = fopen('unsubscribed.txt');
                        fwrite($file, $email . " " . $date . "\n");
                        fclose($file);
                    }
                    echo "<h3>Ваш E-mail: " . $_GET['email'] . "</h3><h3>Вы успешно отписались от рассылки!</h3>";
                }
                else {
                    $text = "<form action='unsubscribe-one-click.php' method='get' style='text-align: left; width: 100%; max-width: 600px; margin: auto;'>"
                        . "<h1>Отписаться от рассылки</h1>"
                        . "<h3>Введите email для отписки:</h3>"
                        . "<input type='text' name='email'><br>"
                        . "<input type='submit' value='Отписаться'>"
                        . "</form>";
                    echo $text;
                }
            ?>
        </div>
    </body>
</html>