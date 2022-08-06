<?php


namespace app\classes;


class InvalidArgumentException extends \Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message, 400);
    }
}
