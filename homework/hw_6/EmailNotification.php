<?php


namespace homework\hw_6;


class EmailNotification extends Notificator
{
    public function __construct(
        protected string $to,
        protected string $subject,
    )
    {
        if (!filter_var($this->to, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Email To is incorrect!!!');
        }

        if (strlen($this->subject) > 255) {
            throw new \Exception('Subject is to long');
        }
    }

    public function setMessage(string $message): void
    {
        $this->message = <<<HTML
        <!doctype html>
        <html lang="en">
            <head>
              <title> {$this->subject} </title>
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
            </head>
            <body style="background-color:#f6ab0c;">
                <div>{$this->message}</div>
            </body>
        </html>
HTML;

    }

    public function send(): void
    {
        mail($this->to, $this->subject, $this->getMessage());
        echo 'Sent Email <br>';
    }
}