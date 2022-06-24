<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class AuthApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\AuthApi::class;
    }
}