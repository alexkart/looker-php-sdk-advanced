<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class SpaceApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\SpaceApi::class;
    }
}