<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class ConfigApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\ConfigApi::class;
    }
}