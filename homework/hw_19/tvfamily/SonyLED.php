<?php


namespace homework\hw_19\tvfamily;


use homework\hw_19\interfaces\LEDInterface;

class SonyLED implements LEDInterface
{

    public function show(): string
    {
        return 'Show Sony LED';
    }
}
