<?php

namespace Alexkart\Looker;

use Exception;
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
    /**
     * @var void
     */
    private Client $authenticatedClient;
    /**
     * @var void
     */
    private $apiConfig;
    private \Alexkart\Looker\Configuration $config;

    public function __construct(\Alexkart\Looker\Configuration $config) {
        $this->config = $config;
        $this->login();
    }

    public function __get(string $name) {
        $class = '\\Alexkart\\Looker\\' . ucfirst($name);

        return new $class($this, $this->authenticatedClient, $this->apiConfig);
    }

    public function login(): void {
        $this->apiConfig = new Configuration();
        $this->apiConfig->setHost($this->config->getHost());

        if ($this->config->getAccessToken() === '') {
            $apiInstance = new ApiAuthApi(
                new Client(),
                $this->apiConfig
            );

            try {
                $result = $apiInstance->login($this->config->getClientId(), $this->config->getClientSecret());
                $this->config->setAccessToken($result->getAccessToken());
                $this->config->setAccessTokenRenewed(true);
            } catch (Exception $e) {
                echo 'Exception when calling ApiAuthApi->login: ', $e->getMessage(), PHP_EOL;
            }
        }

        $this->authenticatedClient = new Client([
            'verify' => false,
            'headers' => [
                'Authorization' => 'token ' . $this->config->getAccessToken(),
            ],
        ]);

        if ($this->config->isAccessTokenRenewed()) {
            $this->config->storeAccessToken($this->config->getAccessToken());
        }
    }

    public function invalidateAccessToken(): void {
        $this->config->setAccessToken('');
    }

    public function getAuthenticatedClient() {
        return $this->authenticatedClient;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string {
        return $this->config->getAccessToken();
    }
}