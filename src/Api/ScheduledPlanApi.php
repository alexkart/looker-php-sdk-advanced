<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class ScheduledPlanApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\ScheduledPlanApi::class;
    }
}