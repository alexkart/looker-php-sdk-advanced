<?php

use Dotenv\Dotenv;

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = new \App\CustomLookerConfiguration(
    $_SERVER['LOOKER_HOST'],
    $_SERVER['LOOKER_CLIENT_ID'],
    $_SERVER['LOOKER_CLIENT_SECRET'],
    $_SERVER['LOOKER_ACCESS_TOKEN']
);
$looker = new \Alexkart\Looker\Looker($config);

$looks = $looker->lookApi->searchLooks(null, 'test');
var_dump($looks);