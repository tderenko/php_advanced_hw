<?php


namespace homework\hw_19\tvfamily;


use homework\hw_19\interfaces\LEDInterface;

class LgLED implements LEDInterface
{

    public function show(): string
    {
        return "Show LG LED";
    }
}
