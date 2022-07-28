<?php


namespace app\homework\hw_6;


class SmsNotification extends Notificator
{

    public function __construct(
        protected string $number
    )
    {
        if (strlen($this->number) !== 12) {
            throw new \Exception('Length of number is incorrect');
        }
    }

    public function send(): void
    {
        echo 'Sent SMS <br>';
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}