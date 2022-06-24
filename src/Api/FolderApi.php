<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class FolderApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\FolderApi::class;
    }
}