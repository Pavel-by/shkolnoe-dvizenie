<!DOCTYPE html>
<html>

<head>
    <title>Регистрация | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css?date=<?php echo filemtime("styles/style.css"); ?>">
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="/module/message.js?ver=<?php echo filemtime("module/message.js"); ?>"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
    <?php include( $_SERVER[ 'DOCUMENT_ROOT' ] . "/module/task-picker.php" );
    include( $_SERVER[ 'DOCUMENT_ROOT' ] . "/module/Tasks.php" ); ?>
    <script type="text/javascript">
        var animation = 200;

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
            if (text.length > maxLen && maxLen > 0) {
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
            taskPicker.setResultBlock(document.getElementById("competitions"));
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
                ok &= CheckTextInput(password, 4, max);

                if (ok) {
                    formError.slideUp(animation);
                    var data = $('#register-form').serializeArray();
                    data.push({
                        name: "competitions",
                        value: JSON.stringify(taskPicker.getChosen())
                    });

                    $.ajax({
                        url: 'scripts/register-script.php',
                        data: $.param(data),
                        type: 'GET',
                        dataType: "JSON",
                        success: function (d) {
                            if (d.error) {
                                if (d.texterror != false) {
                                    Message.create({header: "Ошибка", text: d.texterror});
                                } else {
                                    Message.create({
                                        header: "Ошибка",
                                        text: "Ошибка при обработке данных на сервере"
                                    });
                                }
                            } else {
                                location.replace("login.php?next=user-info.php" + encodeURIComponent("?message=true&messageHeader=Добро пожаловать!&messageText=Вы успешно создали аккаунт!"));
                            }
                        },
                        error: function (d) {
                            Message.create({header: "Ошибка", text: "Ошибка при обработке данных на сервере"});
                        }
                    });
                } else {
                    formError.slideDown(animation);
                }
            });

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
        });
    </script>
</head>

<body>
    <?php
        include('header.html');
    ?>
        <div class="content center limit-block">
            <form id="register-form" class="left" style="display: inline-block; padding-bottom: 50px; width: 600px; max-width: 100%;">

                <h2>Регистрация</h2>

                <h3 class="form-header">Фамилия, имя, отчество организатора (учителя) </h3>
                <div>
                    <input type="text" name="name" class="text-input">
                    <span class="input-error"></span>
                </div>
                <divider></divider>

                <h3 class="form-header">Область/край (автономной округ, иное)</h3>
                <div>
                    <input type="text" name="region" class="text-input">
                    <span class="input-error"></span>
                </div>
                <divider></divider>

                <h3 class="form-header">Город (село, поселок, хутор, деревня, иное)</h3>
                <div>
                    <input type="text" name="city" class="text-input">
                    <span class="input-error"></span>
                </div>
                <divider></divider>

                <h3 class="form-header">Наименование и номер школы</h3>
                <div>
                    <input type="text" name="school" class="text-input">
                    <span class="input-error"></span>
                </div>
                <divider></divider>

                <h3 class="form-header">Выбранные Вами конкурсы</h3>
                
                <input type="button" value="Выбрать конкурсы" id="choose-competitions" class="button-choose">
                <div id="competitions">

                </div>
                <hr>
                <divider></divider>
                
                <h3 class="form-header">Количество учителей (организаторов)</h3>
                <div>
                    <input type="text" name="teachers" class="text-input">
                    <span class="input-error"></span>
                </div>
                <divider></divider>
                
                <h3 class="form-header">Количество участников</h3>
                <div>
                    <input type="text" name="participants" class="text-input">
                    <span class="input-error"></span>
                </div>
                <divider></divider>

                <h3 class="form-header">Электронный адрес</h3>
                <div>
                    <input type="text" name="email" class="text-input" autocomplete="off" autocorrect="off">
                    <span class="input-error"></span>
                </div>
                <divider></divider>

                <h3 class="form-header">Контактный телефон</h3>
                <div>
                    <input type="text" name="phone" class="text-input">
                    <span class="input-error"></span>
                </div>
                <divider></divider>

                <h3 class="form-header">Пароль для входа в систему</h3>
                <div>
                    <input type="password" name="password" class="text-input">
                    <span class="input-error"></span>
                </div>

                <divider></divider>

                <label class="flex-block flex-row flex-left flex-middle">
                    <input type="checkbox" name="post" value="post"
                           id="need-post" style="margin: 10px;">
                    <p>Я хочу получать резутьтаты по почте в бумажном формате</p>
                </label>
                <div id="post-block" style="display: none;">
                    <p class="important-text">Условия отправки бланков по почте России<br><input type="button"
                                                                                                 class="submit-button"
                                                                                                 value="Читать"
                                                                                                 id="openMailCriteria"
                                                                                                 style="margin-left: 0;">
                    </p>
                    <p class="bold">Почтовый индекс</p>
                    <div>
                        <input type="text" name="postcode" class="text-input">
                    </div>

                    <p class="bold">Полный почтовый адрес</p>
                    <div>
                        <input type="text" name="postaddress" class="text-input">
                    </div>

                    <p class="bold">Имя получателя</p>
                    <div>
                        <input type="text" name="postname" class="text-input">
                    </div>
                </div>
                <span class="input-error" id="form-error">Присутствуют ошибки при заполнении полей</span>
                <input type="submit" class="submit-button" value="Зарегистрироваться">
            </form>
        </div>
        <?php
            include('footer.html');
        ?>
</body>

</html>