<?php

use App\PrimeNumber;

include_once '../app/PrimeNumber.php';
$result = false;
$error=false;
$inputValue = 0;
if (isset($_POST['ok'])) {
    if ($_POST['number'] == '') {
        $error=true;
    } else {
        $inputValue = $_POST['number'];
        $result = PrimeNumber::checkPrimeNumber($inputValue);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <a href="/">На главную</a>
    <h1>Проверка простых чисел</h1>
    <form action="/src/task1.php" method="post">
        <label for="number">Введите число для проверки</label>
        <input type="text" id="number" name="number">
        <input type="submit" name="ok" value="Проверить">
    </form>
    <div>
    <?if($error):?>
        Что-то вы не то ввели
    <? elseif ($inputValue) :?>
    Проверяемое число : <?=number_format($inputValue, 0, ',', ' ');?> <br>
    Это число простое -  <?=$result ? 'Да' : 'Нет'?>
    <?endif;?>
    </div>
</div>

</body>
</html>