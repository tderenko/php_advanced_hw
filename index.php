<?php

use app\classes\Currency;
use app\classes\Money;

require_once __DIR__ . '/vendor/autoload.php';

// homework number 8

try {
    new Currency("TEST");
} catch (\app\classes\InvalidArgumentException $e) {
    echo "{$e->getMessage()} <br>";
}

$money1 = new Money(124.2, new Currency('UAH'));
$money2 = new Money(14, new Currency('USD'));
$money3 = new Money(26.53, new Currency('EUR'));
$money4 = new Money(12.5, new Currency('USD'));
$money5 = new Money(18.7, new Currency('USD'));

try {
    $money1->add($money3);
} catch (\app\classes\InvalidArgumentException $e) {
    echo "Invalid argument: {$e->getMessage()} <br>";
} catch (Exception $e){
    echo "Error: {$e->getMessage()} <br>";
} finally {
    $money2
        ->add($money4)
        ->add($money5);
    dd($money2);
}
