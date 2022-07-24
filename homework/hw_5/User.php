<?php
namespace app\homework\hw_5;

class User
{
    public function __construct(
        protected int $id,
        protected string $email,
        protected string $password,
    ){
        if (strlen($this->password) > 8) {
            throw new \Exception('Password is to long!!!');
        }
    }

    public function getUserData(): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email
        ];
    }
}
