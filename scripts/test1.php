<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/system/db.php');
    $sql = mysqli_query($link, "SELECT * FROM `excel-emails1` WHERE `email` LIKE '%@rambler.%'");
    $f = fopen($_SERVER['DOCUMENT_ROOT'] . '/rambler.txt', 'w');
    while ($line = mysqli_fetch_array($sql)){
        fwrite($f, $line['email'] . "\n");
    }
    fclose($f);
?>