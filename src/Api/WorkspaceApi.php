<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class WorkspaceApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\WorkspaceApi::class;
    }
}