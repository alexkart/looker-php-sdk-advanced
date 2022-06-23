<?php

namespace Alexkart\Looker;

class DashboardApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\DashboardApi::class;
    }
}