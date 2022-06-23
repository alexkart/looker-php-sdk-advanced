<?php

namespace App;

class Configuration extends \Alexkart\Looker\Configuration {
    public function storeAccessToken($accessToken): void {
        file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'looker_access_token.txt', $accessToken);
    }

    public function loadAccessToken(): string {
        return (string)file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'looker_access_token.txt');
    }
}