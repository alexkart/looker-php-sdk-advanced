<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class ContentApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\ContentApi::class;
    }
}