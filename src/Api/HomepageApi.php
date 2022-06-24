<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class HomepageApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\HomepageApi::class;
    }
}