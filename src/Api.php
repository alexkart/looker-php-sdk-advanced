<?php

namespace Alexkart\Looker;

use GuzzleHttp\ClientInterface;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;

abstract class Api {
    protected Looker $looker;
    protected ?ClientInterface $client;
    protected ?HeaderSelector $selector;
    protected $api;
    protected ?Configuration $config;

    public function __construct(
        Looker $looker,
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->looker = $looker;
        $this->client = $client;
        $this->config = $config;
        $this->selector = $selector;
        $this->initApi();
    }

    protected function initApi(): void {
        $apiClass = $this->getApiClassName();
        $this->api = new $apiClass($this->client, $this->config, $this->selector);
    }

    public function __call(string $name, array $arguments) {
        try {
            return $this->api->$name(...$arguments);
        } catch (\Throwable $e) {
            $this->looker->invalidateAccessToken();
            $this->looker->login();
            $this->client = $this->looker->getAuthenticatedClient();
            $this->initApi();

            return $this->api->$name(...$arguments);
        }
    }

    abstract protected function getApiClassName(): string;
}