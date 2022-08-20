<?php


namespace homework\hw_15\formats;


use homework\hw_15\contracts\FormatInterface;

class WithDateFormat implements FormatInterface
{

    public function format(string $string)
    {
        return date('Y-m-d H:i:s') . " $string";
    }
}
