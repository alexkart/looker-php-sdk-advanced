<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class QueryApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\QueryApi::class;
    }
}