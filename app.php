<?php

require __DIR__ . '/vendor/autoload.php';

use Deggolok\Services\Configurator\Configurator;

/*
$engine = new \Deggolok\Engine\Engine([
    "confDir" => __DIR__ .'/conf/'
]);
$engine->run();
*/

$app = new \Deggolok\Application\Application([
    "confDir" => __DIR__ . '/conf/'
]);

$app->run();