<?php

namespace Alexkart\Looker;

class Configuration {
    private string $host;
    private string $clientId;
    private string $clientSecret;
    private string $accessToken;
    private bool $accessTokenRenewed = false;

    public function __construct(string $host, string $clientId = '', string $clientSecret = '', string $accessToken = '') {
        $this->host = $host;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken ?: $this->loadAccessToken();

        $this->validate();
    }

    private function validate() {
        if ($this->accessToken === '' && ($this->clientId === '' || $this->clientSecret === '')) {
            throw new \Exception('You must provide either a valid access token or API credentials.');
        }
    }

    /**
     * @return string
     */
    public function getHost(): string {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getClientId(): string {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string {
        return $this->clientSecret;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void {
        $this->accessToken = $accessToken;
    }

    /**
     * @return bool
     */
    public function isAccessTokenRenewed(): bool {
        return $this->accessTokenRenewed;
    }

    /**
     * @param bool $accessTokenRenewed
     */
    public function setAccessTokenRenewed(bool $accessTokenRenewed): void {
        $this->accessTokenRenewed = $accessTokenRenewed;
    }

    public function storeAccessToken($accessToken): void {
    }

    public function loadAccessToken(): string {
        return '';
    }
}