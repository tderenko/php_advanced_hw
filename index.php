<?php
/**
 * @var $dbConnection PDO
 */


use homework\hw_15\delivers\DeliverByEmail;
use homework\hw_15\delivers\DeliverBySms;
use homework\hw_15\delivers\DeliverToConsole;
use homework\hw_15\formats\RawFormat;
use homework\hw_15\formats\WithDateAndDetailsFormat;
use homework\hw_15\formats\WithDateFormat;
use homework\hw_15\Logger;

require_once 'vendor/autoload.php';

$logger = new Logger(new RawFormat(), new DeliverBySms());
$logger->log('Emergency error! Please fix me!');
echo "<br>";
$logger = new Logger(new WithDateFormat(), new DeliverByEmail());
$logger->log('Emergency error! Please fix me!');
echo "<br>";
$logger = new Logger(new WithDateAndDetailsFormat(), new DeliverToConsole());
$logger->log('Emergency error! Please fix me!');
