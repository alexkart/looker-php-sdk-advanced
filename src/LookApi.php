<?php

namespace Alexkart\Looker;

class LookApi extends Api {
    protected function getApiClassName(): string {
        return \Swagger\Client\Api\LookApi::class;
    }
}