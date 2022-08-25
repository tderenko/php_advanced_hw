<?php


namespace homework\hw_19\tvfamily;


use homework\hw_19\interfaces\LCDInterface;

class LgLCD implements LCDInterface
{

    public function show(): string
    {
        return "Show LG LCD";
    }
}
