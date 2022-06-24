<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class LookApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\LookApi::class;
    }
}