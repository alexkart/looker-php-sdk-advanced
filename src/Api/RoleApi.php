<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class RoleApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\RoleApi::class;
    }
}