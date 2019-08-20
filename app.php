<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new \Deggolok\Application\Application([
    "confDir" => __DIR__ . '/conf/'
]);
$app->run();