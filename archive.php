<!DOCTYPE html>
<html>

<head>
    <title>Архив | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
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
                            <h1 class="page-title">Архив</h1>
                            <p>Архив пуст</p>
                        </div>
                </div>
            </div>
        </div>
        <?php
        include("footer.html");
    ?>
</body>

</html>