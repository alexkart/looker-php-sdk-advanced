<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class DataActionApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\DataActionApi::class;
    }
}