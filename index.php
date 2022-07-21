<?php
require_once 'vendor/autoload.php';
$db = new PDO('pgsql:host=psql;dbname=postgres', 'postgres', 'pass');
dd($db);