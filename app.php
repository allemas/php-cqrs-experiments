<?php

require_once __DIR__ . '/vendor/autoload.php';


$app = new \Deggolok\Application\Application([
    "configuration_directory" => __DIR__ . '/conf/'
]);
$app->run();