<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class ThemeApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\ThemeApi::class;
    }
}