<?php

namespace Alexkart\Looker;

use GuzzleHttp\Client;
use Swagger\Client\Api\ApiAuthApi;
use Swagger\Client\Api;
use Swagger\Client\Configuration;

/**
 * @property Api\ApiAuthApi apiAuthApi
 * @property Api\AuthApi authApi
 * @property Api\ColorCollectionApi colorCollectionApi
 * @property Api\ConfigApi configApi
 * @property Api\ConnectionApi connectionApi
 * @property Api\ContentApi contentApi
 * @property Api\DashboardApi dashboardApi
 * @property Api\DataActionApi dataActionApi
 * @property Api\DatagroupApi datagroupApi
 * @property Api\DerivedTableApi derivedTableApi
 * @property Api\FolderApi folderApi
 * @property Api\GroupApi groupApi
 * @property Api\HomepageApi homepageApi
 * @property Api\IntegrationApi integrationApi
 * @property Api\LookApi lookApi
 * @property Api\LookmlModelApi lookmlModelApi
 * @property Api\ProjectApi projectApi
 * @property Api\QueryApi queryApi
 * @property Api\RenderTaskApi renderTaskApi
 * @property Api\RoleApi roleApi
 * @property Api\ScheduledPlanApi scheduledPlanApi
 * @property Api\SessionApi sessionApi
 * @property Api\SpaceApi spaceApi
 * @property Api\ThemeApi themeApi
 * @property Api\UserApi userApi
 * @property Api\UserAttributeApi userAttributeApi
 * @property Api\WorkspaceApi workspaceApi
 */
class Looker {
    private Client $authenticatedClient;
    private Configuration $apiConfig;
    private LookerConfiguration $lookerConfig;
    private array $clientConfig;

    public function __construct(LookerConfiguration $lookerConfig, array $clientConfig = []) {
        $this->lookerConfig = $lookerConfig;
        $this->clientConfig = $clientConfig;
        $this->login();
    }

    public function login(): void {
        $this->apiConfig = new Configuration();
        $this->apiConfig->setHost($this->lookerConfig->getHost());

        if ($this->lookerConfig->getAccessToken() === '') {
            $apiInstance = new ApiAuthApi(
                new Client($this->clientConfig),
                $this->apiConfig
            );

            try {
                $result = $apiInstance->login($this->lookerConfig->getClientId(), $this->lookerConfig->getClientSecret());
                $this->lookerConfig->setAccessToken($result->getAccessToken());
                $this->lookerConfig->setAccessTokenRenewed(true);
            } catch (\Throwable $e) {
                echo 'Exception when calling ApiAuthApi->login: ', $e->getMessage(), PHP_EOL;
            }
        }

        $this->authenticatedClient = new Client([
            'verify' => false,
            'headers' => [
                'Authorization' => 'token ' . $this->lookerConfig->getAccessToken(),
            ],
        ]);

        if ($this->lookerConfig->isAccessTokenRenewed()) {
            $this->lookerConfig->storeAccessToken($this->lookerConfig->getAccessToken());
            $this->lookerConfig->setAccessTokenRenewed(false);
        }
    }

    public function invalidateAccessToken(): void {
        $this->lookerConfig->setAccessToken('');
    }

    public function getAuthenticatedClient(): Client {
        return $this->authenticatedClient;
    }

    public function getAccessToken(): string {
        return $this->lookerConfig->getAccessToken();
    }

    public function __get(string $name) {
        $class = '\\Alexkart\\Looker\\Api\\' . ucfirst($name);

        return new $class($this, $this->authenticatedClient, $this->apiConfig);
    }

    public function getLookerConfig(): LookerConfiguration {
        return $this->lookerConfig;
    }

    public function getClientConfig(): array {
        return $this->clientConfig;
    }
}