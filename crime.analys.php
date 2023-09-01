<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="author" content="Русин Даниил">
    <meta name="description" content="Практика">
    <meta name="keywords" content="Анализ,преступность,путешествия,страна,безопасность">
    <link rel='stylesheet' type='text/css' media='screen' href='pokras.css'>
    <link rel="manifest" href="/manifest.json">
    <title>Страны</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        body{
        background-image: url(Разноцветная-земля.jpg);
        background-repeat: no-repeat;
        background-size: cover;
            }
    </style>
</head>
<body style="background-color: rgb(255, 255, 255);">
    <a href="crime.analys2.html" class="button1">Вторая страница<a>
    <a href="crime.analys3.html" class="button2">Третья страница<a>
    <form onsubmit="searchCity(event)" class="forma" action="test.php" method="post">
        <label for="cityName" class="formtext">Введите название города:</label>
        <input type="text" name="cityName">
        <button type="submit" name="submit" class="button3">Найти</button>
    </form>
    <div id="result"></div>
    <output id="result">
    <?php 
        /* include('test.php');  */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($POST["cityName"]) && !empty($POST["cityName"])) {
                echo "Переменная содержит данные: " . $POST["cityName"];
            }}
    ?>
    <script>
    if('serviceWorker' in navigator){
    navigator.serviceWorker.register('serviceworker.js', {scope: '/'});
    }
    </script>
</body>
</html>