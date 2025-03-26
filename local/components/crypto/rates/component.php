<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Web\HttpClient;

$apiKey = trim($arParams["API_KEY"]); // Убираем лишние пробелы
$cacheTime = intval($arParams["CACHE_TIME"]);

if ($this->startResultCache($cacheTime)) {
    $httpClient = new HttpClient();
    $httpClient->setTimeout(10);
    $httpClient->setHeader("User-Agent", "Bitrix Crypto Rates Component/1.0");

    // URL
    $url = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1";
    if (!empty($apiKey)) {
        $url .= "&x_cg_api_key=" . urlencode($apiKey);
    }

    try {
        $response = $httpClient->get($url);
        $status = $httpClient->getStatus();

        if ($status == 200) {
            $data = json_decode($response, true);
            if ($data && is_array($data)) {
                $arResult["CRYPTO_DATA"] = $data;
                $this->setResultCacheKeys(array("CRYPTO_DATA"));
                $this->includeComponentTemplate();
            } else {
                $this->abortResultCache();
                ShowError("Ошибка: данные не в формате JSON");
            }
        } else {
            $this->abortResultCache();
            ShowError("Ошибка API: HTTP статус " . $status);
        }
    } catch (\Exception $e) {
        $this->abortResultCache();
        ShowError("Ошибка запроса: " . $e->getMessage());
    }
}