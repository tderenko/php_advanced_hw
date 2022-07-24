<?php
use app\homework\hw_4\Color;
require_once __DIR__ . '/vendor/autoload.php';

// homework 3
$db = new PDO('pgsql:host=psql;dbname=postgres', 'postgres', 'pass');


// homework 4
$color = new Color(200, 200, 200);
$mixedColor = $color->mix(new Color(100, 100, 100));

echo $mixedColor->getRed(), '<br>'; // 150
echo $mixedColor->getGreen(), '<br>'; // 150
echo $mixedColor->getBlue(), '<br>'; // 150

d($color->equals($mixedColor)); // false
d($mixedColor->equals(new Color(150, 150, 150))); // true

d(Color::random());
