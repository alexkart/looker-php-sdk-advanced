<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class DashboardApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\DashboardApi::class;
    }
}