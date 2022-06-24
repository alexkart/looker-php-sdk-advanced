<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class UserAttributeApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\UserAttributeApi::class;
    }
}