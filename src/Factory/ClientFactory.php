<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Factory;

use GuzzleHttp\ClientInterface;
use Hiap\Selfwork\Client\Client;
use Hiap\Selfwork\Config\Config;

class ClientFactory
{
    private ClientInterface $client;

    public function __construct(
        ClientInterface $client = null
    ) {
        $this->client = $client ?? new \GuzzleHttp\Client();
    }

    public function build(Config $config): Client
    {
        return new Client(
            $config,
            $this->client,
        );
    }
}
