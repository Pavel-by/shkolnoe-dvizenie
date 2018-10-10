<!DOCTYPE html>
<html>

<head>
    <title>Главная | &laquo;Школьное движение&raquo; - всероссийский конкурс</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css?date=<?php echo filemtime("styles/style.css"); ?>">
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <div class="cover-background" style="background-image: url(images/test.jpg); position: fixed; width: 100%; height: 100%;"></div>
    <div style="position: relative;">
    <?php
        include("header.html");
    ?>
        <div class="main-site-title cover-background">
            <div class="limit-block" style="position: relative;">
                <h1>Лучший набор конкурсов для школьников</h1>
                <p>Всероссийский дистанционный конкурс по всем школьным предметам</p>
            </div>
        </div>
        <div class="main-background" style="box-shadow: 0 -8px 8px rgba(0, 0, 0, 0.158);">
            <div class="limit-block">
                <div class="center-flex-block">
                    <div style="padding: 30px;">
                        <div class="flex-block flex-row flex-between flex-middle">
                            <div>
                                <h3>Наши конкурсы: </h3>
                                <p class="bold">1-5 классы:</p>
                                <p>Окружающий мир</p>
                                <p class="bold">5-11 классы:</p>
                                <p>Биология, География, История, Обществознание</p>
                                <p class="bold">1-11 классы:</p>
                                <p>Английский язык, Литература, Логика, Математика, Русский язык, Эрудит, Знаток, Ребус, Физкультура, ИЗО, Музыка, Технология, Книголюб, Биология, Гражданин, Грамматика, Программист, Турпоход, Эврика</p>
                            </div>
                            <div>
                                <img src="images/children-near-the-board.png" style="width: 400px;">
                            </div>
                        </div>
                        <hr>
                        <div class="flex-block flex-row flex-between flex-middle">
                            <div>
                                <img src="images/children-near-the-board-math.png" style="width: 400px;">
                            </div>
                            <div>
                                <h3>Стоимость участия</h3>
                                <p>Стоимость участия — <span class="bold">55 рублей за одного участника и по одному предмету.</span></p>
                                <p class="bold">Из них: </p>
                                <p><span class="bold">50 рублей</span> – направляются в оргкомитет организаторам конкурса,</p>
                                <p><span class="bold">5 рублей</span> – остаются в школе на сопутствующие организационные расходы.</p>
                                <p>Предмет по выбору.</p>
                                <p>Каждый предмет – самостоятельный конкурс (с отдельным сертификатом).</p>
                            </div>
                        </div>
                        <hr>
                        <div class="flex-block flex-row flex-between flex-middle">
                            <div>
                                <h3>Награждение</h3>
                                <p><span class="bold">Всем участникам</span>, без ограничения, предоставляется Сертификат участника конкурса «Школьное движение».</p>
                                <p><span class="bold">Учителя</span>, задействованные в подготовке и проведении конкурса, получат Благодарственные грамоты.</p>
                                <p><span class="bold">Школы</span>, представившие к участию более 15-ти человек, получат Благодарственные письма.</p>
                                <p>Среди финалистов первых мест путем простой случайной выборки будут определены призеры конкурса, которым будут отправлены подарки: Планшеты и Медали. Десять школ с наиболее высоким рейтингом (по количеству баллов своих учащихся) получат главный приз Конкурса - Кубок Победителя.</p>
                            </div>
                            <div>
                                <img src="images/children-with-cup.png" style="width: 400px;">
                            </div>
                        </div>
                        <hr>

                        <div class="center card">
                            <h3>Регистрация уже началась! Присоединяйтесь!</h3>
                            <a href="registration.php" class="bright-button">Принять участие</a>
                        </div>

                        <div class="center card">
                            <p class="bold">Скачать дополнительные материалы:</p>
                            <div class="download">
                                <img src="images/download.png">
                                <a href="files/welcome.docx">Скачать приглашение</a>
                            </div>
                            <div class="download">
                                <img src="images/download.png">
                                <a href="files/prikaz.docx">Скачать приказ о проведении</a>
                            </div>
                            <div class="download">
                                <img src="images/download.png">
                                <a href="files/reglament.docx">Скачать регламент конкурса</a>
                            </div>
                        </div>
                        <!--p class="small-info-text">Конкурс &laquo;Школьное движение&raquo; - Всероссийский дистанционный конкурс по математике и русскому языку</p>
                        <p class="small-info-text">Конкурс проводится в тестовой форме и состоит из 15 заданий с выбором одного или нескольких вариантов ответа.</p>
                        <p class="small-info-text">Все участники конкурся получат сертификаты. Отличившиеся участники получат денежные призы. Педагоги, задействованные в подготовке и проведении конкурса, получат Благодарственные грамоты. Все школы, представившие к участию более
                            15-ти человек, получат Благодарственные письма.</p>
                        <p class="small-info-text">Задания конкурса составлены так, чтобы каждый ученик нашел для себя интересные и доступные вопросы. Мы постоянно работаем над качеством предлагаемых заданий, стремимся сделать процесс участия в наших конкурсах наиболее доступным
                            и интересным
                        </p>
                        <p class="small-info-text">Конкурс воспитывает у обучающихся любовь к русскому языку, учит бережно относиться к слову, пробуждает интерес к истории языка, стремление совершенствовать свою грамотность, расширять словарный запас, осознанно применять изученные
                            правила.
                        </p>
                        <p class="small-info-text">
                                Конкурс привлекает учеников к решению математических задач, показывает каждому школьнику, что обдумывание задач может быть делом живым, увлекательным, и даже веселым!
                        </p>
                        <div class="card">
                            <h2>Стоимость</h2>
                            <p>Стоимость конкурса составляет <b>55 рублей</b> за одного участника</p>

                            <h2>Сроки проведения</h2>
                            <p>Конкурс проводится с <b>05 по 25 февраля 2018</b> года</p>
                            <div style="padding: 10px;">
                                <a href="registration.php" class="bright-button">Принять участие</a>
                            </div>
                            <div>
                                <div class="download">
                                    <img src="images/download.png">
                                    <a href="files/welcome_5.docx">Скачать приглашение</a>
                                </div>
                                <div class="download">
                                    <img src="images/download.png">
                                    <a href="files/prikaz_5.docx">Скачать приказ о проведении</a>
                                </div>
                                <div class="download">
                                    <img src="images/download.png">
                                    <a href="files/reglament_5.docx">Скачать регламент конкурса</a>
                                </div>
                            </div>
                        </div-->
                    </div>
                </div>
            </div>
        </div>

        <?php
            include("footer.html");
        ?>
    </div>
</body>

</html>