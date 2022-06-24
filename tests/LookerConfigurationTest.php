<?php

namespace Tests;

use Alexkart\Looker\LookerConfiguration;
use Alexkart\Looker\LookerConfigurationException;
use PHPUnit\Framework\TestCase;

class LookerConfigurationTest extends TestCase {
    /** @test */
    public function it_successfully_creates_configuration_with_credentials_or_token() {
        $config1 = new LookerConfiguration('host', 'id', 'secret');
        $this->assertInstanceOf(LookerConfiguration::class, $config1);
        $config2 = new LookerConfiguration('host', '', '', 'token');
        $this->assertInstanceOf(LookerConfiguration::class, $config2);
    }

    /** @test */
    public function it_throws_exception_if_token_or_credentials_not_provided() {
        $this->expectException(LookerConfigurationException::class);
        $config = new LookerConfiguration('host');
    }

    /** @test */
    public function it_throws_exception_if_token_or_client_id_not_provided() {
        $this->expectException(LookerConfigurationException::class);
        $config = new LookerConfiguration('host', '', 'secret');
    }

    /** @test */
    public function it_throws_exception_if_token_or_client_secret_not_provided() {
        $this->expectException(LookerConfigurationException::class);
        $config = new LookerConfiguration('host', 'id');
    }
}