<?php

$response = json_decode(file_get_contents('https://min-api.cryptocompare.com/data/histoday?fsym=BTC&tsym=USD&limit=60'));