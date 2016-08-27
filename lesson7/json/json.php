<?php
$url = 'http://api.openweathermap.org/data/2.5/weather?id=498817&units=metric&appid=14f961f196291e83139e62cdf66bb7d2';

$json = file_get_contents($url);
$weather = json_decode($json, true);

echo '<pre>';
print_r($weather);
echo '<pre>';