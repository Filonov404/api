<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult["CRYPTO_DATA"])) {
    echo "<table border='1' style='border-collapse: collapse;width: 100%'>";
    echo "<tr><th>Название</th><th>Символ</th><th>Цена (USD)</th><th>Рыночная капитализация (USD)</th></tr>";
    foreach ($arResult["CRYPTO_DATA"] as $crypto) {
        $name = $crypto["name"];
        $symbol = $crypto["symbol"];
        $price = $crypto["current_price"];
        $marketCap = $crypto["market_cap"];
        echo "<tr><td>{$name}</td><td>{$symbol}</td><td>{$price}</td><td>{$marketCap}</td></tr>";
    }
    echo "</table>";
} else {
    echo "Данные о криптовалютах не доступны.";
}