<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class DerivedTableApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\DerivedTableApi::class;
    }
}