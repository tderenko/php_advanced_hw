<?php
try {
    global $dbConnection;
    $dbConnection = new PDO('mysql:dbname=php_advance;host=db', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Database connection is failed! {$e->getMessage()}");
}

