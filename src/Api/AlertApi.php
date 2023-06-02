<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class AlertApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\AlertApi::class;
    }
}