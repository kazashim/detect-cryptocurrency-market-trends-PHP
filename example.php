<?php

/*
|Author: Kazashim Kuzasuwat
|Title: Detect Cryptocurrency Market Trends Using PHP 
|Date: 29-08-2020
*/

ini_set('trader.real_precision', '8');

$response = json_decode(file_get_contents('https://min-api.cryptocompare.com/data/histoday?fsym=BTC&tsym=USD&limit=60'));

$prices = [];

foreach ($response->Data as $v) {
    $prices[] = $v->close;
}


$ema8 = trader_ema($prices, 8);
$ema21 = trader_ema($prices, 21);
$current_8 = array_pop($ema8);
$current_21 = array_pop($ema21);
$previous_8 = array_pop($ema8);
$previous_21 = array_pop($ema21);

echo 'Current 8-day: ' . $current_8 . "\n";
echo 'Current 21-day: ' . $current_21 . "\n";
echo 'Previous 8-day: ' . $previous_8 . "\n";
echo 'Previous 21-day: ' . $previous_21 . "\n";

if ($current_8 > $current_21 && $previous_8 < $previous_21) {
    echo 'Buy';
} elseif ($current_8 < $current_21 && $previous_8 > $previous_21) {
    echo 'Sell';
} else {
    echo 'Do Nothing';
}

?>
