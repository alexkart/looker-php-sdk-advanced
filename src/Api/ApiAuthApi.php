<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class ApiAuthApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\ApiAuthApi::class;
    }
}