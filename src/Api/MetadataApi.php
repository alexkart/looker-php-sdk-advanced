<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class MetadataApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\MetadataApi::class;
    }
}