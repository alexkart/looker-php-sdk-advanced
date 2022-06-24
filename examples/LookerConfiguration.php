<?php

namespace App;

class LookerConfiguration extends \Alexkart\Looker\LookerConfiguration {
    public function storeAccessToken($accessToken): void {
        file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'looker_access_token.txt', $accessToken);
    }

    public function loadAccessToken(): string {
        return (string)file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'looker_access_token.txt');
    }
}