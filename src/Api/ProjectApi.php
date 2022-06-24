<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class ProjectApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\ProjectApi::class;
    }
}