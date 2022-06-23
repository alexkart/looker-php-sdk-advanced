<?php

namespace App;

class Looker extends \Alexkart\Looker\Looker {
    protected function storeAccessToken($accessToken): void {
        file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'looker_access_token.txt', $accessToken);
    }

    protected function loadAccessToken(): string {
        return (string)file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'looker_access_token.txt');
    }
}