<?php

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$config = new \Alexkart\Looker\LookerConfiguration(
    'https://looker-host:19999/api/3.1',
    'client-id',
    'client-secret',
    'optional-access-token'
);
$looker = new \Alexkart\Looker\Looker($config);

$looks = $looker->lookApi->searchLooks(null, 'test');
var_dump($looks);

$looks1 = $looker->lookApi->searchLooks(null, 'test1');
var_dump($looks1);

$dashboards = $looker->dashboardApi->allDashboards(['title']);
var_dump($dashboards);