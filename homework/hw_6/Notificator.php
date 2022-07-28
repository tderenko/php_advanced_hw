<?php

namespace app\homework\hw_6;

use app\homework\hw_6\contracts\SenderInterface;

abstract class Notificator implements SenderInterface
{
    protected $message;

    public function getMessage(): string
    {
        return $this->message ?: '';
    }

    abstract public function setMessage(string $message): void;
}
