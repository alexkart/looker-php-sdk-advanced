<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class UserApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\UserApi::class;
    }
}