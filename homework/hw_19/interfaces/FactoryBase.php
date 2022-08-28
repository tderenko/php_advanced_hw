<?php


namespace homework\hw_19\interfaces;


interface FactoryBase
{
    public function makeLED(): LEDInterface;
    public function makeLCD(): LCDInterface;
}
