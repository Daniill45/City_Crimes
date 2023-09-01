<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="author" content="Русин Даниил">
    <meta name="description" content="Практика">
    <link rel='stylesheet' type='text/css' media='screen' href='pokras.css'>
    <link rel="manifest" href="manifest.json">
    <title>Страны</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        body{
        background-image: url(Разноцветная-земля2.jpg);
        background-repeat: no-repeat;
        background-size: cover;
            }
    </style>
</head>
<body style="background-color: rgb(255, 255, 255);">

<?php

    $a=0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $cityToFind = $_POST["cityName"]; // Название города, который вы ищете

        if (($handle = fopen("website_dataset.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Проверяем, содержит ли текущая строка название города
                if (in_array($cityToFind, $data)) {
                    $a=1;
                    echo '<div class="data-box">';
                    echo '<h2>Искомая строка найдена: ' . $cityToFind . '</h2>';
                    echo '</div>';
            
                    // Отдельные окошки для каждого критерия
                    echo '<div class="data-box">';
                    echo '<h2>Критерий 1</h2>';
                    echo '<p>Страна: ' . $data[0] . '</p>';
                    echo '</div>';
            
                    echo '<div class="data-box">';
                    echo '<h2>Критерий 2</h2>';
                    echo '<p>Население: ' . $data[2] . '</p>';
                    echo '</div>';
            
                    echo '<div class="data-box">';
                    echo '<h2>Критерий 3</h2>';
                    echo '<p>Уровень преступности (0-100): ' . $data[3] . '</p>';
                    echo '</div>';

                    echo '<div class="data-box">';
                    echo '<h2>Критерий 4</h2>';
                    echo '<p>Природные катастрофы (1-5): ' . $data[4] . '</p>';
                    echo '</div>';

                    echo '<div class="data-box">';
                    echo '<h2>Критерий 5</h2>';
                    echo '<p>Уровень организованной преступности (0-100): ' . $data[5] . '</p>';
                    echo '</div>';

                    echo '<div class="data-box">';
                    echo '<h2>Критерий 6</h2>';
                    echo '<p>Поддержка малого бизнеса (0-100): ' . $data[6] . '</p>';
                    echo '</div>';

                    echo '<div class="data-box">';
                    echo '<h2>Критерий 7</h2>';
                    echo '<p>Уровень свободы (0-100): ' . $data[7] . '</p>';
                    echo '</div>';

                    echo '<div class="data-box">';
                    echo '<h2>Критерий 8</h2>';
                    echo '<p>Цена на жильё и аренду (0-100): ' . $data[8] . '</p>';
                    echo '<p>(Чем ниже уровень, тем выгоднее является цена)</p>';
                    echo '</div>';

                    echo '<div class="data-box">';
                    echo '<h2>Критерий 9</h2>';
                    echo '<p>Покупательская способность (0-100): ' . $data[9] . '</p>';
                    echo '</div>';

                    // Выход из цикла, так как информация найдена
                    break;
                
                }
            }
            fclose($handle);
            
          
            if  ($a==0)
                echo '<div class="data-box">';
                echo "<h2>Искомая строка отсутствует</h2>";
        }
}
?>
</body>
</html>