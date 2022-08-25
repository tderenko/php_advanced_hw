<?php


namespace homework\hw_19\factories;


use homework\hw_19\interfaces\FactoryBase;
use homework\hw_19\interfaces\LCDInterface;
use homework\hw_19\interfaces\LEDInterface;
use homework\hw_19\tvfamily\LgLCD;
use homework\hw_19\tvfamily\LgLED;

class LGFactory implements FactoryBase
{
    public function makeLCD(): LCDInterface
    {
        return new LgLCD();
    }

    public function makeLED(): LEDInterface
    {
        return new LgLED();
    }
}
