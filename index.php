<?php

use classes\Currency;
use classes\Money;

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (!file_exists($path)) {
        throw new Exception("Class \"$class\" in \"$path\" not found!!!");
    }
    include_once $path;
});

$currency = new Currency('UAH');
$money = new Money(123, $currency);

echo '<pre>', print_r($money, true), '</pre>';
