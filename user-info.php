<?php
ini_set("display_errors", "1");

error_reporting(E_ALL);
include('scripts/check-autorization.php');
require_once "scripts/common-functions.php";
require_once "system/constants.php";


include('system/db.php');
include('scripts/error-script.php');

$message = "";
if ($link) {
    $userkey = $_SESSION['userkey'];
    $rez = mysqli_query($link, "SELECT * FROM `users` WHERE `userkey`='$userkey'");
    $rez = mysqli_fetch_array($rez);
    $registerDate = new DateTime($rez['registerdate']);
    $compareDate = new DateTime(date("Y-m-d H:i:s", strtotime("-5 days")));
    $editable = (($registerDate > $compareDate) or (!constants::BLOCK_AFTER_FIVE_DAYS));
    $competitions = $rez['classes'];
    if (!$editable) {
        $message = "<p class='important-text'>С момента регистрации прошло более 5 дней, изменение данных больше недоступно.</p>";
    }
} else {
    $message = "<p class='input-error'>Ошибка при подключении к базе данных</p>";
    log::e("user-info.php: Ошибка при подключении к БД");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Информация о пользователе | Личный кабинет | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css?date=<?php echo filemtime("styles/style.css"); ?>">
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="/module/message.js?ver=<?php echo filemtime("module/message.js"); ?>"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/module/task-picker.php");
    include($_SERVER['DOCUMENT_ROOT'] . "/module/Tasks.php"); ?>
    <script type="text/javascript">
        var showHello = <?php echo(isset($_GET['message']) ? "true;" : "'';"); ?>
        var helloHeader = <?php echo(isset($_GET['messageHeader']) ? "'" . $_GET['messageHeader'] . "';" : "false;"); ?>
        var helloText = <?php echo(isset($_GET['messageText']) ? "'" . $_GET['messageText'] . "';" : "'';"); ?>

        var animation = 200;
        var choosenCompetitions = $.parseJSON("<?php echo addslashes($competitions); ?>");

        function CheckTextInput(elem, minLen, maxLen) {
            var text = $(elem).val();
            var result = true;
            if (text.length < minLen && minLen > 0) {
                if (text.length == 0) {
                    result = 'Это поле обязательно для заполнения';
                } else {
                    result = "Минимальная длина " + minLen + " символа(ов)";
                }
            }
            if (text.length > maxLen && maxlen > 0) {
                result = "Максимальная длина " + maxLen + " символа(ов)";
            }
            if (minLen == maxLen && maxLen > 0) {
                if (text.length > maxLen || text.length < minLen) {
                    result = "Длина поля должна составлять " + maxLen + " символа(ов)";
                }
            }

            if (result != true) {
                $(elem).addClass('error');
                $(elem).next().html(result);
                $('#form-error').slideDown(animation);
            } else {
                $(elem).removeClass('error');
                $('#form-error').slideUp(animation);
            }

            return result == true;
        }

        function CheckEmail(elem) {
            var v = $(elem).val();
            var result = true;
            if (v.indexOf('@') == -1) {
                result = "Адрес электронной почты должен содержать символ «@».";
            } else if (v.indexOf('@') == 0) {
                result = "Введите часть адреса до символа «@». Адрес «" + v + "» неполный.";
            } else if (v.indexOf('@') == v.length - 1) {
                result = "Введите часть адреса после символа «@». Адрес «" + v + "» неполный.";
            }
            if (result != true) {
                $(elem).addClass('error');
                $(elem).next().html(result);
                $('#form-error').slideDown(animation);
                return false;

            } else {
                $(elem).removeClass('error');
                $('#form-error').slideUp(animation);
                return true;
            }
        }

        function RegisterTextInput(elem, minLen, maxLen) {
            $(elem).focusout(function () {
                CheckTextInput(elem, minLen, maxLen);
            });
            $(elem).keyup(function () {
                CheckTextInput(elem, minLen, maxLen);
            });
        }


        document.addEventListener('DOMContentLoaded', function () {
            var taskPicker = new TaskPicker(Tasks.getTasks());
            taskPicker.setChosen(choosenCompetitions);
            taskPicker.setResultBlock(document.getElementById("competitions"));
            taskPicker.update();
            var formError = $('#form-error');
            var name = $('input[name=name]');
            var region = $('input[name=region]');
            var city = $('input[name=city]');
            var school = $('input[name=school]');
            var postcode = $('input[name=postcode]');
            var classes = $('input[name=classes]');
            var email = $('input[name=email]');
            var phone = $('input[name=phone]');
            var password = $('input[name=password]');

            formError.slideUp(animation);

            var min = 4;
            var max = 255;

            RegisterTextInput(name, min, max);
            RegisterTextInput(school, min, max);
            RegisterTextInput(phone, 1, max);
            RegisterTextInput(password, 4, max);


            $(email).focusout(function () {
                CheckEmail(email);
            });
            $(email).keyup(function () {
                CheckEmail(email);
            });

            document.getElementById('register-form').addEventListener('submit', function (e) {
                e.preventDefault();
                var ok = true;

                ok &= CheckTextInput(name, min, max);
                ok &= CheckTextInput(school, min, max);
                ok &= CheckEmail(email);
                ok &= CheckTextInput(phone, 1, max);

                if (ok) {
                    formError.slideUp(animation);
                    var data = $('#register-form').serializeArray();
                    data.push({name: "competitions", value: JSON.stringify(taskPicker.getChosen())});

                    $.ajax({
                        url: 'scripts/update-user-info-script.php',
                        data: $.param(data),
                        type: 'GET',
                        dataType: "JSON",
                        success: function (d) {
                            if (d.error) {
                                if (d.texterror != false) {
                                    new Message.create({header: "Ошибка", text: d.texterror});
                                } else {
                                    new Message.create({
                                        header: "Ошибка",
                                        text: "Ошибка при обработке данных на сервере"
                                    });
                                }
                            } else {
                                window.location.href = window.location.href.split('?')[0]
                                    + "?message=true&messageHeader=Успех&messageText=Данные были успешно изменены";
                            }
                        },
                        error: function (d) {
                            new Message.create({header: "Ошибка", text: "Ошибка при обработке данных на сервере"});
                        }
                    });
                } else {
                    formError.slideDown(animation);
                }
                return false;
            }, false);

            document.getElementById("choose-competitions").addEventListener('click', function () {
                taskPicker.show();
            });

            $("#openMailCriteria").click(function () {
                var text = "<ol>\n    <li><p>\n        Бумажные Сертификаты участникам, Благодарности учителям за организацию, Благодарственное письмо в адрес\n        школы,\n        Дипломы I, II, III мест, Благодарности учителям за подготовку Победителя (ученика) высылаются почтой России при\n        количестве участников не менее 30-ти (одним почтовым отправлением, сразу же после подведения результатов по\n        данной\n        школе), бланки ответов почтой России не высылаются, а скачиваются электронно вместе с заданиями\n    </p></li>\n\n    <li><p>\n        Бумажные бланки ответов, Сертификаты участникам и Благодарности учителям за организацию\n        высылаются почтой России при количестве участников не менее 80-ти, сразу же после оплаты Конкурса (олимпиад) - в\n        первый раз (также можно и самостоятельно скачать электронные бланки ответов по желанию, чтобы не ждать почту\n        России)\n        Дипломы I, II, III мест,\n        Благодарности учителям за подготовку Победителя (ученика),\n        Благодарственное письмо в адрес школы\n        высылаются почтой России, сразу же после подведения результатов по данной школе - во второй раз\n    </p></li>\n</ol>";
                Message.create({header: "Условия отправки писем через почту России", text: text});
            });

            document.getElementById("need-post").addEventListener('change', function () {
                if (this.checked) {
                    $("#post-block").css("display", "block");
                }
                else {
                    $("#post-block").css("display", "none");
                }
            });

            if (showHello) {
                Message.create({header: helloHeader, text: helloText});
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
        <div class="flex-block flex-column flex-top flex-left">
            <?php
            include("user-menu.html")
            ?>
            <div style="text-align: center; width: 100%;">
                <h1 class="page-title">Информация о пользователе</h1>
                <form id="register-form" class="left"
                      style="display: inline-block; padding-bottom: 50px; width: 600px; max-width: 100%; margin: auto;">
                    <?php
                    echo $message;
                    ?>

                    <h3 class="form-header">Фамилия, Имя, Отчество Организатора (Учителя) </h3>
                    <div>
                        <input type="text" name="name" class="text-input"
                               value="<?php echo htmlspecialchars($rez['name']); ?>" <?php echo $editable ? "" : "disabled"; ?>>
                        <span class="input-error"></span>
                    </div>
                    <divider></divider>

                    <h3 class="form-header">Область/край (автономной округ, иное)</h3>
                    <div>
                        <input type="text" name="region" class="text-input"
                               value="<?php echo htmlspecialchars($rez['region']); ?>" <?php echo $editable ? "" : "disabled"; ?>>
                        <span class="input-error"></span>
                    </div>
                    <divider></divider>

                    <h3 class="form-header">Город (село, поселок, хутор, деревня, иное)</h3>
                    <div>
                        <input type="text" name="city" class="text-input"
                               value="<?php echo htmlspecialchars($rez['city']); ?>" <?php echo $editable ? "" : "disabled"; ?>>
                        <span class="input-error"></span>
                    </div>
                    <divider></divider>

                    <h3 class="form-header">Наименование и номер школы</h3>
                    <div>
                        <input type="text" name="school" class="text-input"
                               value="<?php echo htmlspecialchars($rez['school']); ?>" <?php echo $editable ? "" : "disabled"; ?>>
                        <span class="input-error"></span>
                    </div>
                    <divider></divider>

                    <h3 class="form-header">Количество учителей (организаторов)</h3>
                    <div>
                        <input type="text" name="teachers" class="text-input"
                               value="<?php echo htmlspecialchars($rez['teachers']); ?>" <?php echo $editable ? "" : "disabled"; ?>>
                        <span class="input-error"></span>
                    </div>
                    <divider></divider>

                    <h3 class="form-header">Количество участников</h3>
                    <div>
                        <input type="text" name="participants" class="text-input"
                               value="<?php echo htmlspecialchars($rez['participants']); ?>" <?php echo $editable ? "" : "disabled"; ?>>
                        <span class="input-error"></span>
                    </div>
                    <divider></divider>

                    <h3 class="form-header">Выбранные Вами конкурсы</h3>

                    <input type="button" value="Выбрать конкурсы" id="choose-competitions"
                           class="button-choose <?php echo $editable ? "" : "hidden"; ?>">
                    <div id="competitions">

                    </div>

                    <hr>
                    <divider></divider>

                    <h3 class="form-header">Электронный адрес</h3>
                    <div>
                        <input type="text" name="email" class="text-input"
                               value="<?php echo htmlspecialchars($rez['email']); ?>" <?php echo $editable ? "" : "disabled"; ?>>
                        <span class="input-error"></span>
                    </div>
                    <divider></divider>

                    <h3 class="form-header">Контактный телефон</h3>
                    <div>
                        <input type="text" name="phone" class="text-input"
                               value='<?php echo htmlspecialchars($rez['phone']); ?>' <?php echo $editable ? "" : "disabled"; ?>>
                        <span class="input-error"></span>
                    </div>
                    <divider></divider>

                    <label class="flex-block flex-row flex-left flex-middle">
                        <input type="checkbox" name="post" value="post"
                               id="need-post" style="margin: 10px;"
                            <?php echo(htmlspecialchars($rez['post']) == 0 ? "" : "checked='on'"); ?>
                            <?php echo $editable ? "" : "disabled"; ?>>
                        <p>Я хочу получать резутьтаты по почте в бумажном формате</p>
                    </label>
                    <div id="post-block" <?php echo(htmlspecialchars($rez['post']) == 0 ? "style=\"display: none;\"" : ""); ?>>
                        <p class="important-text">Условия отправки бланков по почте России<br><input type="button"
                                                                                                     class="submit-button"
                                                                                                     value="Читать"
                                                                                                     id="openMailCriteria"
                                                                                                     style="margin-left: 0;">
                        </p>
                        <p class="bold">Почтовый индекс</p>
                        <div>
                            <input type="text" name="postcode" class="text-input"
                                   value="<?php echo htmlspecialchars($rez['postcode']); ?>">
                        </div>

                        <p class="bold">Полный почтовый адрес</p>
                        <div>
                            <input type="text" name="postaddress" class="text-input"
                                   value="<?php echo htmlspecialchars($rez['postaddress']); ?>">
                        </div>

                        <p class="bold">Имя получателя</p>
                        <div>
                            <input type="text" name="postname" class="text-input"
                                   value="<?php echo htmlspecialchars($rez['postname']); ?>">
                        </div>
                    </div>

                    <span class="input-error" id="form-error">Присутствуют ошибки при заполнении полей</span>
                    <input type="submit" class="submit-button"
                           value="Сохранить" <?php echo $editable ? "" : "disabled"; ?>>
                </form>

            </div>
        </div>
    </div>
</div>
<?php
include("footer.html");
?>
</body>

</html>