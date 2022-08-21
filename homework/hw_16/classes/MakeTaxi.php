<?php


namespace homework\hw_16\classes;


class MakeTaxi
{
    const DELIVERIES = [
        'economical' => EconomicalTaxi::class,
        'standard' => StandardTaxi::class,
        'lux' => LuxTaxi::class
    ];

    public static function drive(string $delivery)
    {
        if (in_array($delivery, array_keys(static::DELIVERIES))) {
            $class = static::DELIVERIES[$delivery];
            echo (new $class)->drive();
        }
    }
}
