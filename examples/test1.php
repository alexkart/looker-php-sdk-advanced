<?php

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$looker = new \App\Looker(
    'https://looker-host:19999/api/3.1',
    'client-id',
    'client-secret',
);

$looks = $looker->lookApi->searchLooks(null, 'test');
var_dump($looks);