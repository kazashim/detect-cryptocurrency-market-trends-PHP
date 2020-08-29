<?php

/*
|Author: Kazashim Kuzasuwat
|Title: Detect Cryptocurrency Market Trends Using PHP 
|Date: 29-08-2020
*/
$response = json_decode(file_get_contents('https://min-api.cryptocompare.com/data/histoday?fsym=BTC&tsym=USD&limit=60'));

$prices = [];

foreach ($response->Data as $v) {
    $prices[] = $v->close;
}

$ema8 = trader_ema($prices, 8);
$ema21 = trader_ema($prices, 21);