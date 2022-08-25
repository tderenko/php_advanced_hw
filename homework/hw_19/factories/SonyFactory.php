<?php


namespace homework\hw_19\factories;


use homework\hw_19\interfaces\FactoryBase;
use homework\hw_19\interfaces\LCDInterface;
use homework\hw_19\interfaces\LEDInterface;
use homework\hw_19\tvfamily\SonyLCD;
use homework\hw_19\tvfamily\SonyLED;

class SonyFactory implements FactoryBase
{
    public function makeLCD(): LCDInterface
    {
        return new SonyLCD();
    }

    public function makeLED(): LEDInterface
    {
        return new SonyLED();
    }
}
