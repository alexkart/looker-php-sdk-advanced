<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class BoardApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\BoardApi::class;
    }
}