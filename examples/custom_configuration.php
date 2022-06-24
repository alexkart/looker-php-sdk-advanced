<?php

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$config = new \App\CustomLookerConfiguration(
    'https://looker-host:19999/api/3.1',
    'client-id',
    'client-secret',
);
$looker = new \Alexkart\Looker\Looker($config);

$looks = $looker->lookApi->searchLooks(null, 'test');
var_dump($looks);