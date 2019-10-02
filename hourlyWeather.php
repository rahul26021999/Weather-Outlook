<?php

$baseurl = 'https://api.darksky.net/forecast/669458e7eb4aafca31e788f759c1a770/';
$lat = $_GET['lat'];
$lng = $_GET['long'];

$url = $baseurl.$lat.','.$lng.'?exclude=[minutely,daily,currently,alerts,flags]';
ini_set('allow_url_fopen', 1);

$response_hourly = file_get_contents($url);

$array_hourly = array();
$array_hourly = (json_decode($response_hourly, true))['hourly']['data'];


