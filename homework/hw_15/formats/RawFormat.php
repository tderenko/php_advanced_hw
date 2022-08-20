<?php

namespace homework\hw_15\formats;

use homework\hw_15\contracts\FormatInterface;

class RawFormat implements FormatInterface
{

    public function format(string $string)
    {
        return $string;
    }
}
