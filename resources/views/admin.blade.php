<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
        table {border: 3px solid grey;}
        th, td {padding: 10px 15px; border: 3px solid grey;}
        table {border-collapse: collapse;}
    </style>

</head>
<body>
<div>

</div>
<table borfer = 1>
<tr>
    <td>Город</td>
    <td>Температура</td>
    <td>Дата запроса</td>
    <td>Сайт с которого взята информация</td>
</tr>
<?php
$city_weather_list = DB::table('city_temp')->get();
foreach ($city_weather_list as $city_weather)
{
    echo '<tr>';
    echo '<th>'.$city_weather->city.'</th>';
    echo '<th>'.$city_weather->temp.'</th>';
    echo '<th>'.$city_weather->date.'</th>';
    echo '<th>'.$city_weather->service.'</th>';
    echo '</tr>';
}
?>

</table>
<form action="/">

    <p><button>Выйти из учётной записи</button></p>
</form>
</body>
</html>