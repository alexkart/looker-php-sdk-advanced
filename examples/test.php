<?php

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$looker = new \Alexkart\Looker\Looker(
    'https://looker-host:19999/api/3.1',
    'client-id',
    'client-secret',
    'optional-access-token'
);

$looks = $looker->lookApi->searchLooks(null, 'test');
var_dump($looks);

$dashboards = $looker->dashboardApi->allDashboards(['title']);
var_dump($looks);
