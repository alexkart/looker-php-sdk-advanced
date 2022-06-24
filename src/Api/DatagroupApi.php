<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class DatagroupApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\DatagroupApi::class;
    }
}