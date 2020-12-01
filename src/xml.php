<?php
echo '<a href="/"> На главную </a>';
$xml = simplexml_load_file('../xml/test.xml');
$bankrupt = [];
foreach ($xml->BankruptInfo->BankruptPerson as $item) {
    $bankrupt['id'] = (String) $item['Id'];
    $bankrupt['type'] =(String) $item['InsolventCategoryName'];
    $bankrupt['firstName'] = (String) $item['FirstName'];
    $bankrupt['middleName'] = (String) $item['MiddleName'];
    $bankrupt['lastName'] = (String) $item['LastName'];

}

$lotList = [];

$temp = $xml->MessageInfo->Auction->LotTable;

$temp = (json_decode(json_encode($temp), true));
foreach ($temp['AuctionLot'] as $key => $item) {
    $lotList[$key]['item'] = $item['Order'];
    $lotList[$key]['price'] = $item['StartPrice'];
    $lotList[$key]['description'] =trim($item['Description']);
}
echo '<h2> Должник </h2>';
echo 'id - ' . $bankrupt['id'] . '<br>';
echo 'Тип - ' . $bankrupt['type'] . '<br>';
echo 'Фамилия, Имя, Отчество - ' . $bankrupt['firstName'] . ' ' . $bankrupt['middleName'] . ' ' . $bankrupt['lastName'] . '<br>';

echo '<hr>';

echo '<h3> Список лотов </h3>';

foreach ($lotList as $item) {
    echo 'Номер лота - ' . $item['item'] . '<br>';
    echo 'Цена - ' . $item['price'] . '<br>';
    echo 'Описание - ' . $item['description'] . '<br>';
}