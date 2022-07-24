<?php

use app\homework\hw_5\User;

require_once 'vendor/autoload.php';
$db = new PDO('pgsql:host=psql;dbname=postgres', 'postgres', 'pass');

try {
    $user = new User('asd', 'email@test.com', 'password');
} catch (TypeError $e) {
    d($e->getMessage());
}

try {
    $user = new User(123, 'email@test.com', 'very long password');
} catch (Exception $e) {
    d($e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
}

$user = new User(2, 'test@email.com', 'password');
dd($user->getUserData());
