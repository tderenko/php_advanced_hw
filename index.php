<?php
require_once __DIR__ . '/vendor/autoload.php';

// homework number 8

$user = new \app\homework\hw_8\User();

try {
    $user->setEmail('newtestemail@mail.com');
} catch (Exception $e) {
    d("Error message: \"{$e->getMessage()}\" in {$e->getFile()}:{$e->getLine()}!!!");
} finally {
    $user->setName('Taras');
    $user->setAge(32);
    dd($user->getAll());
}
