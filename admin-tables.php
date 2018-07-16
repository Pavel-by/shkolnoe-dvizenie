<?php
    include("scripts/check-admin-permissions.php");
    include_once("system/db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Добавление разрешений | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css?date=<?php echo filemtime("styles/style.css"); ?>">
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="/module/message.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
    <style type="text/css" >
        .table-info {
            border-collapse: collapse;
        }
        .table-info td {
            padding: 10px;
            border: 1px rgb(223, 223, 223) solid;
        }
        .table-info tr {
            position: relative;
        }
    </style>
</head>

<body>
    <?php
        include("header.html");
    ?>
        <div class="content">
            <div class="limit-block">
                <div class="flex-block flex-column flex-top flex-left">
                    <?php
                        include("admin-menu.html");
                    ?>
                    <div style="width: 100%;">
                        <div class="card">
                            <a href="scripts/admin-get-table.php?table=users">Таблица заявок</a>
                        </div>
                        <div class="card">
                            <a href="scripts/admin-get-table.php?table=payment">Таблица оплат</a>
                        </div>
                        <div class="card">
                            <a href="scripts/admin-get-table.php?table=answers">Таблица бланков</a>
                        </div>
                        <div class="card">
                            <a href="scripts/admin-get-table.php?table=subscribed">Таблица подписавшихся</a>
                        </div>
                        <div class="card">
                            <a href="scripts/admin-get-table.php?table=unsubscribed">Таблица отписавшихся</a>
                        </div>
                        <!--?php
                            $linesCount = 40;
                            if (isset($_GET['page'])) {
                                $page = mysqli_real_escape_string($link, $_GET['page']);
                            }
                            else {
                                $page = 1;
                            }
                            if ($link) {
                                $start = ($page - 1) * $linesCount + 1;
                                $end = $page * $linesCount;
                                $sql = mysqli_query($link, "SELECT `name`, `school`, `email`, `id` FROM `users` ORDER BY `id` LIMIT $start, $end");
                                $s = "<table class='table-info'>";
                                $s .= "<tr class='bold'>"
                                    . "<td>Номер</td>"
                                    . "<td>ID</td>"
                                    . "<td>Имя</td>"
                                    . "<td>Email</td>"
                                    . "<td>Школа</td>"
                                    . "</tr>";
                                $i = $start;
                                while ($row = mysqli_fetch_array($sql)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $school = $row['school'];
                                    $email = $row['email'];

                                    $s .= "<a href='#' style='display: block;'><tr>"
                                        . "<td>$i</td>"
                                        . "<td>$id</td>"
                                        . "<td>$name</td>"
                                        . "<td>$email</td>"
                                        . "<td>$school</td>"
                                        . "</tr></a>";
                                    $i += 1;
                                }
                                $s .= "</table>";
                                echo $s;
                            }
                        ?-->
                    </div>
                </div>
            </div>
        </div>
        <?php
        include("footer.html");
    ?>
</body>

</html>