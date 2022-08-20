<?php

namespace homework\hw_15;

use homework\hw_15\contracts\DeliverInterface;
use homework\hw_15\contracts\FormatInterface;
use homework\hw_15\delivers\DeliverBySms;
use homework\hw_15\formats\RawFormat;

class Logger
{
    private $format;
    private $delivery;

    public function __construct(FormatInterface $format, DeliverInterface $delivery)
    {
        $this->format   = $format;
        $this->delivery = $delivery;
    }

    public function log($string)
    {
        $this->delivery->printFormat($this->format->format($string));
    }
}
