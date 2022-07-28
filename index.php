<?php
require_once __DIR__ . '/vendor/autoload.php';

function sendNotification(\app\homework\hw_6\contracts\SenderInterface $sender) {
    $sender->send();
}

$emailNofitication = new \app\homework\hw_6\EmailNotification(
    'test@gmail.com',
    'TestMessage'
);
$emailNofitication->setMessage('Test Email message');

$smsNotification = new \app\homework\hw_6\SmsNotification('380999999999');
$smsNotification->setMessage('Test SMS message');

sendNotification($emailNofitication);
sendNotification($smsNotification);


$test = new \app\homework\hw_6\Test();
echo $test->getSum();
