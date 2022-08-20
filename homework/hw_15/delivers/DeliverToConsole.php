<?php


namespace homework\hw_15\delivers;


use homework\hw_15\contracts\DeliverInterface;

class DeliverToConsole implements DeliverInterface
{

    public function printFormat(string $format)
    {
        echo "Вывод формата ({$format}) в консоль";
    }
}
