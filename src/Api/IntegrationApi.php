<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class IntegrationApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\IntegrationApi::class;
    }
}