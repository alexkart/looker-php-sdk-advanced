<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class ConnectionApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\ConnectionApi::class;
    }
}