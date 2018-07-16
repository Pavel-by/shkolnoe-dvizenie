<?php
    ini_set ("display_errors", "1");

    error_reporting(E_ALL);

    set_time_limit(60 * 60 * 2);

$dir = $_SERVER['DOCUMENT_ROOT'] . "/files/task";
$out = fopen($_SERVER['DOCUMENT_ROOT'] . "/files/test.txt", 'w');
echo $_SERVER['DOCUMENT_ROOT'] . "/files/test.txt";

func($dir);
function func($dir) {
    global $out;
    $files = scandir($dir);
    $j = cut($dir);
    fwrite($out, "\"$j\"=>array(\n");
    foreach ($files as $file) {
        if ($file == '.' or $file == '..') {
            continue;
        }

        if (is_dir("$dir/$file")) {
            func("$dir/$file");
            continue;
        }
        $i = parse($file);

        $temp = explode(".", $file);

        $newName = createName(basename($dir), parse($i), end($temp));

        copy("$dir/$file", "$dir/$newName");
        unlink("$dir/$file");
        fwrite($out, "$i => \"$newName\",\n");
    }
    fwrite($out, "),\n");
}

fclose($out);

function parse($s) {
    return (int) preg_replace('/[^0-9]/', '', $s);
}

function cut($s) {
    $mas = preg_split("/(\/)/", $s);
    return $mas[count($mas)-1];
}

function createName($parent, $number, $ext) {
    return "$parent\_$number\_class.$ext";
}

    /*$example = [
        'ivan',
       'maria',
       'viktor',
       'olga',
       'konstantin',
       'alex',
       'svetlana',
       'tamara',
    ];
    
    for ($i = 0; $i < 8; $i += 2) {
        printf("%-12s%12s\n", $example[$i], $example[$i+1]);
    }*/

    /*$s = curl_init(); 

    curl_setopt($s, CURLOPT_URL, "http://185.112.80.14:80");
    curl_setopt($s, CURLOPT_CONNECTTIMEOUT , 5);
    
    echo curl_exec($s);

    curl_close($s);*/

    /*require_once "error-script.php";

    $x1 = 192;
    $x2 = 168;
    $x3 = 206;
    $x4 = 50;

    for ($i = 0; $i < 510; $i++) {
        $domain = "http://$x1.$x2.$x3.$x4/";
        if (check_domain_availible($domain)) {
            log::d("$domain OK");
        }
        else {
            log::d("$domain ERROR");
        }
        $x4++;
        if ($x4 == 256) {
            $x4 == 0;
            $x3++;
        }
        if ($x3 == 256) {
            $x3 == 0;
            $x2++;
        }
        if ($x2 == 256) {
            $x2 == 0;
            $x1++;
        }
    }
 

    function check_domain_availible($domain)
    {
        if (!filter_var($domain, FILTER_VALIDATE_URL))
            return false;

        $curlInit = curl_init($domain);
        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curlInit, CURLOPT_HEADER, true);
        curl_setopt($curlInit, CURLOPT_NOBODY, true);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curlInit);
        curl_close($curlInit);

        if ($response) 
            return true;
        return false;
    }*/


    //Переводим из csv файла в таблицу
    /*include($_SERVER['DOCUMENT_ROOT'] . "/system/db.php");
    $f = fopen($_SERVER['DOCUMENT_ROOT'] . "/testExcel/valid.csv", 'r');
    $line = fgets($f);
    $emails = array();
    while ($line = fgets($f)) {
        $email = trim((preg_split('/(;)/', $line)[0]), " \t\n\r\0\x0B\"");
        $emails[] = $email;
    }
    fclose($f);

    $emails = "'" . implode("','", $emails) . "'";
    $sql = mysqli_query($link, "INSERT INTO `valid-emails`(`email`,`name`,`type`) (SELECT `email`,`name`,`type` FROM `excel-emails1` WHERE `email` IN($emails))");*/

    /**тестим NewsLetter Script */
    /*include("newsletter-script.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/system/db.php");
    $newsletter = new Newsletter();

    $newsletter->setHost("connect.smtp.bz");
    $newsletter->setPort("2525");
    $newsletter->setLogin("mairon-pasha@yandex.ru");
    $newsletter->setPassword("fAAVokNrArek");
    $newsletter->setMaxMessagesInMinute(1);
    $newsletter->setMaxMessagesInHour(40);
    $newsletter->setSendedDBName("sended-emails");
    $newsletter->setEmailsDBName("valid-emails");
    $newsletter->hasName();

    $text = file_get_contents("../email-letter.html");

    for ($i = 0; $i < 50; $i++) {
        $email = $newsletter->getNext();
        
        $data = preg_replace('/__EMAIL__/m', $email['email'], $text);
        $data = preg_replace('/__NAME__/m', $email['name'], $text);

        $newsletter->send(array(
            "email" => $email['email'],
            "name" => $email['name'],
            "unsubscribe" => array(
                "link" => "http://konkurs-5erka.ru/unsubscribe-one-click.php",
                "email" => "support@konkurs-5erka.ru"
            ),
            "text" => $data
        ));

        mysqli_query($link, "INSERT IGNORE INTO `sended-emails`(`email`) VALUES('" . $email['email'] . "')");
    }*/
    /*include($_SERVER['DOCUMENT_ROOT'] . "/system/db.php");

    $sql = mysqli_query($link, "SELECT `email` FROM `excel-emails1` ORDER BY `id` LIMIT 4000");
    $f = fopen($_SERVER['DOCUMENT_ROOT'] . "/NEED_TO_BE_CHECKED.txt", 'w');
    while ($line = mysqli_fetch_array($sql)){
        fwrite($f, $line['email'] . "\n");
    }
    fclose($f);*/

    //Отослать письмо
    /*include('mail.php');

    $email = "web-nxbg7@mail-tester.com";
    $to_name = "Товарисчу";

    $data = file_get_contents("../email-letter.html");
    $data = preg_replace('/__EMAIL__/m', $email, $data);
    $data = preg_replace('/__NAME__/m', $to_name, $data);

    $message_data = array(
        "username" => "mairon-pasha@yandex.ru",
        "password" => "fAAVokNrArek",
        'title' => 'Конкурс "Пятерка" приглашает к участию всех желающих',
        'to' => $email,
        'to_name' => $to_name,
        'text' => $data,
        'unsubscribe' => array(
            'link' => "http://konkurs-5erka.ru/unsubscribe-one-click.php?email=$email",
            'email' => 'support@konkurs-5erka.ru'
        ),
        'from' => "newsletter@konkurs-5erka.ru"
    );

    $mail = new mail();
    $mail->setHost("connect.smtp.bz");
    if (!$mail->send($message_data)){
        echo "NO";
    }
    else {
        echo "YES";
    }*/

    

    //Удаляем пробелы в названии
    /*$dir = $_SERVER['DOCUMENT_ROOT'] . "/files/task/technology/Шко движ технология 5-11 кл. дев.  юн";
    renameFiles($dir);
    function renameFiles($dir) {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file == '.' or $file == '..') {
                continue;
            }
            $newname = $dir . '/' . preg_replace('/(\ )/', '', $file);
            rename($dir . '/' . $file, $newname);
            if (is_dir($newname)) {
                renameFiles($newname);
            }
        }
    }*/

    //E-mail сообщение

    
    /*$urls = preg_match_all("/<img[^<>]*src=\"?'?([^'\" ]*)\"?'?[^<>]*>/m", $data, $matches);
    $names = preg_match_all("/<img[^<>]*src=\"?\'?(?:[^\'\" ]*\/)?([^\'\" ]*)\"?\'?[^<>]*>/m", $data, $matches);
    $rez = preg_replace("/(<img[^<>]*src=\"?\'?)(?:[^\'\" ]*\/)?([^\'\" ]*)(\"?\'?[^<>]*>)/m", "\${1}cid:\${2}\${3}", $data);
    echo $rez;*/

    /*include('mail.php');

    $data = file_get_contents("../email-letter.html");

    $message_data = array(
        'title' => 'Образец рассылки',
        'to' => 'web-gneny@mail-tester.com',
        'to_name' => 'PRIZER',
        'text' => $data,
        'unsubscribe' => array(
            'link' => 'https://konkurs-5erka.ru/unsubscribe-one-click.php',
            'email' => 'support@konkurs-5erka.ru'
        )
        );

    $mail = new mail();
    $mail->send($message_data);*/


    //Проверка E-mail
    /*include('check-email-address.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/system/db.php');
    include('error-script.php');

    $sql = mysqli_query($link, 'SELECT `email` FROM `excel-emails` ORDER BY `id` LIMIT 300, ');
    $checked = array();
    while ($line = mysqli_fetch_array($sql)){
        if (checkEmail($line['email'])){
            log::d('OK ' . $line['email']);
            $rez = mysqli_query($link, "INSERT INTO `checked-emails`(`email`) VALUES('" . $line['email'] ."')");
            if (!$rez){
                log::d(mysqli_error($link));
            }
        }
        else {
            log::d('FALSE ' . $line['email']);
        }
    }*/
    //$sql = mysqli_query($link, "INSERT INTO `checked-emails`(`email`) VALUES('" . implode("','", $checked) . "')")
    //log::d("INSERT INTO `checked-emails`(`email`) VALUES('" . implode("'),('", $checked) . "')");







    //echo "<h1 style='text-align: center;'>Раскомменть меня</h1>";

    //Считывание Word файлов
    /*function read_file_docx($filename){

        $striped_content = '';
        $content = '';

        if(!$filename || !file_exists($filename)) return false;

        $zip = zip_open($filename);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
    }
    include("db.php");
    include("error-script.php");
    foreach (scandir("test") as $file){
        if ($file == ".." or $file == ".") continue;
        $s = read_file_docx("test/" . $file);
        $arr = preg_match_all("/(?'email'[^, \n]+@[^, \n]+)/m", $s, $matches);
        log::d("ОБРАБОТКА ФАЙЛА $file");
        $count = 0;
        $count1 = 1;
        foreach ($matches as $mas){
            $sql = "";
            foreach ($mas as $email){
                if ($count < 10){
                    $count++;
                    log::d("EMAIL: $email");
                }
                $sql .= "('$email'),";
                
            }
            $sql = substr($sql, 0, -1);
            log::d("INSERTED");
            $rez = mysqli_query($link, "INSERT IGNORE INTO `emails`(`email`) VALUES $sql");
            if (!$rez){
                log::d("SQL ERROR: " . mysqli_error($link));
            }
        }
    }*/

    //Выборка из таблицы
    /*include($_SERVER['DOCUMENT_ROOT'] . '/system/db.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/scripts/error-script.php');


    $criterion = "`type`='Гимназии' or "
        . "`type`='Гимназии-интернаты' or "
        . "`type`='Кадетские школы / корпуса' or "
        . "`type`='Лицеи' or "
        . "`type`='Лицеи-интернаты' or "
        . "`type`='Общеобразовательные школы' or "
        . "`type`='Учебные центры' or "
        . "`type`='Частные школы' or "
        . "`type`='Школы' or "
        . "`type`='Школы-интернаты' or "
        . "`type`='Школы санаторного типа' or "
        . "`type`='Прогимназии, начальные школы-детские сады'";
    
    $rez = mysqli_query($link, "INSERT IGNORE INTO `excel-emails1`(`email`, `name`, `type`) SELECT `email`,`name`,`type` FROM `excel` WHERE $criterion");
    $rez = mysqli_query($link, "SELECT COUNT(*) as 'count' FROM `excel` WHERE $criterion");

    log::d("SELECT COUNT(*) as 'count' FROM `excel` WHERE $criterion");
    if (!$rez){
        log::d("SQL: " . mysqli_error($link));
    }
    else{
        $rez = mysqli_fetch_array($rez);
        log::d($rez['count']);
    }*/

    //Удаление кавычек
    /*if (!$link){
        log::d("FATAL ERROR: NO MYSQL CONNECTION");
        exit();
    }
    $rez = mysqli_query($link, "SELECT `id`,`email` FROM `emails` WHERE `email` LIKE '&lt;%&gt;'");
    if (!$rez){
        log::d("FATAL ERROR: " . mysqli_error($link));
        exit();
    }
    while ($arr = mysqli_fetch_array($rez)){
        $s = $arr['email'];
        $s = preg_replace('/&lt;(.+)&gt;/', '$1', $s);
        log::d("REPLACE TO $s FROM ".$arr['email']);
        $id = $arr['id'];
        $check = mysqli_query($link, "SELECT COUNT(*) as 'count' FROM `emails`WHERE `email`='$s'");
        $check = mysqli_fetch_array($check);
        if ($check['count'] == 0){
            log::d("UPDATE <UPDATE `emails` SET `email`='$s' WHERE `id`=$id>");
            $updateResult = mysqli_query($link, "UPDATE `emails` SET `email`='$s' WHERE `id`=$id");
            if (!$updateResult){
                log::d("ERROR: " . mysqli_error($link) . "email=$s, id=$id");
            }
        }
        else{
            $deleteResult = mysqli_query($link, "DELETE FROM `emails` WHERE `id`=$id");
            log::d("MATCH $s");
        }
        
    }*/


    //Разделение E-mail по символу |
    /*include($_SERVER['DOCUMENT_ROOT'] . '/system/db.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/scripts/error-script.php');

    $newEmails = array();

    $sql = mysqli_query($link, "SELECT `email` FROM `excel-emails1` WHERE `email` LIKE '%|%'");
    log::d(mysqli_error($link));

    while ($emails = mysqli_fetch_array($sql)){
        $email = $emails['email'];
        $new = explode('|', $email);
        foreach ($new as $val){
            $newEmails[] = '("' . trim($val) . '")';
        }
    }
    
    $sql = mysqli_query($link, "INSERT IGNORE INTO `excel-emails1`(`email`) VALUES".implode(',', $newEmails));
    log::d(mysqli_error($link));*/
    
    //Удаление E-mail с символом |
    /*include($_SERVER['DOCUMENT_ROOT'] . '/system/db.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/scripts/error-script.php');

    $sql = mysqli_query($link, "DELETE FROM `excel-emails1` WHERE `email` LIKE '%|%'");*/

    

?>