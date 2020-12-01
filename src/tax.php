<?php

use App\Invoice;

include_once '../app/Invoice.php';
$result = 0;
$error=false;
$inputValue = 0;
if (isset($_POST['ok'])) {
    if ($_POST['date'] == '' || $_POST['sum'] == '') {
        $error=true;
    } else {
        $inputValue = $_POST['sum'];
        $sum = new Invoice($inputValue);
        $result = $sum->sumInvoiceWithoutTax();
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
    <h1>Счет</h1>
    <form action="/src/tax.php" method="post">
        <label for="date">Дата счета</label>
        <input type="text" id="date" name="date">
        <label for="sum">Сумма счета</label>
        <input type="text" id="sum" name="sum">
        <input type="submit" name="ok" value="Расчитать сумму без НДС">
    </form>
    <div>
    <?if($error):?>
        Что-то вы не то ввели
    <? elseif ($result != 0):?>
    Сумма с НДС : <?=number_format($inputValue, 2, ',', ' ');?> <br>
    Сумма без НДС : <?=number_format($result, 2, ',', ' ');?>
    <?endif;?>
    </div>
</div>

</body>
</html>

