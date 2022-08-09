<?php

require_once 'vendor/autoload.php';

$db = new PDO('mysql:dbname=php_advance;host=db', 'root', 'root');

dd($db);
