<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class GroupApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\GroupApi::class;
    }
}