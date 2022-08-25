<?php


namespace homework\hw_19\tvfamily;


use homework\hw_19\interfaces\LCDInterface;

class SonyLCD implements LCDInterface
{

    public function show(): string
    {
        return 'Show Sony LCD';
    }
}
