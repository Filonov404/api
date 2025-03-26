<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "API_KEY" => array(
            "PARENT" => "BASE",
            "NAME" => "API ключ (необязательно)",
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "CACHE_TIME" => array(
            "PARENT" => "CACHE_SETTINGS",
            "NAME" => "Время кэширования (сек.)",
            "TYPE" => "STRING",
            "DEFAULT" => "3600",
        ),
    ),
);