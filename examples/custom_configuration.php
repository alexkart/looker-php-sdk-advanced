<?php

use Dotenv\Dotenv;

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$lookerConfig = new \App\CustomLookerConfiguration(
    $_SERVER['LOOKER_HOST'],
    $_SERVER['LOOKER_CLIENT_ID'],
    $_SERVER['LOOKER_CLIENT_SECRET'],
    $_SERVER['LOOKER_ACCESS_TOKEN']
);
$clientConfig = [
    'verify' => false, // disable SSL verification
];
$looker = new \Alexkart\Looker\Looker($lookerConfig, $clientConfig);

$looks = $looker->lookApi->searchLooks(null, 'test');
var_dump($looks);