<?php

namespace Alexkart\Looker;

class LookerConfiguration {
    private string $host;
    private string $clientId;
    private string $clientSecret;
    private string $accessToken;
    private bool $accessTokenRenewed = false;

    /**
     * @throws \Exception
     */
    public function __construct(string $host, string $clientId = '', string $clientSecret = '', string $accessToken = '') {
        $this->host = $host;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken ?: $this->loadAccessToken();

        $this->validate();
    }

    /**
     * @throws \Exception
     */
    private function validate(): void {
        if ($this->accessToken === '' && ($this->clientId === '' || $this->clientSecret === '')) {
            throw new LookerConfigurationException('You must provide either a valid access token or API credentials.');
        }
    }

    public function getHost(): string {
        return $this->host;
    }

    public function getClientId(): string {
        return $this->clientId;
    }

    public function getClientSecret(): string {
        return $this->clientSecret;
    }

    public function getAccessToken(): string {
        return $this->accessToken;
    }

    public function setAccessToken(string $accessToken): void {
        $this->accessToken = $accessToken;
    }

    public function isAccessTokenRenewed(): bool {
        return $this->accessTokenRenewed;
    }

    public function setAccessTokenRenewed(bool $accessTokenRenewed): void {
        $this->accessTokenRenewed = $accessTokenRenewed;
    }

    public function storeAccessToken($accessToken): void {
    }

    public function loadAccessToken(): string {
        return '';
    }
}