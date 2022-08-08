<?php

namespace homework\hw_6;

use homework\hw_6\contracts\SenderInterface;

abstract class Notificator implements SenderInterface
{
    protected $message;

    public function getMessage(): string
    {
        return $this->message ?: '';
    }

    abstract public function setMessage(string $message): void;
}
