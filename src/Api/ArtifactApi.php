<?php

namespace Alexkart\Looker\Api;

use Alexkart\Looker\Api;

class ArtifactApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\ArtifactApi::class;
    }
}