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
    private string $host;
    private string $clientId;
    private string $clientSecret;
    private string $accessToken;
    /**
     * @var void
     */
    private Client $authenticatedClient;
    /**
     * @var void
     */
    private $config;

    public function __construct(string $host, string $clientId, string $clientSecret, string $accessToken = '') {
        $this->host = $host;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken;
        $this->login();
    }

    public function __get(string $name) {
        $class = '\\Alexkart\\Looker\\' . ucfirst($name);

        return new $class($this, $this->authenticatedClient, $this->config);
    }

    public function login(): void {
        $this->config = new Configuration();
        $this->config->setHost($this->host);

        if ($this->accessToken === '') {
            $apiInstance = new ApiAuthApi(
                new Client(),
                $this->config
            );

            try {
                $result = $apiInstance->login($this->clientId, $this->clientSecret);
                $this->accessToken = $result->getAccessToken();
            } catch (Exception $e) {
                echo 'Exception when calling ApiAuthApi->login: ', $e->getMessage(), PHP_EOL;
            }
        }

        $this->authenticatedClient = new Client([
            'verify' => false,
            'headers' => [
                'Authorization' => 'token ' . $this->accessToken,
            ],
        ]);
    }

    public function invalidateAccessToken(): void {
        $this->accessToken = '';
    }

    public function getAuthenticatedClient() {
        return $this->authenticatedClient;
    }
}