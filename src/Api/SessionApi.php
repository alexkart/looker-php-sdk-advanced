<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class SessionApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\SessionApi::class;
    }
}