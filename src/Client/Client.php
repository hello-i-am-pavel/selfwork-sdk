<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client;

use GuzzleHttp\Exception\ClientException;
use Hiap\Selfwork\Client\Common\Common;
use Hiap\Selfwork\Client\ElectronicDocumentManagement\ElectronicDocumentManagement;
use Hiap\Selfwork\Client\Payouts\Payouts;
use Hiap\Selfwork\Client\Selfemployed\SelfEmployed;
use Hiap\Selfwork\Client\Statistics\Statistics;
use Hiap\Selfwork\Client\Tax\Tax;
use GuzzleHttp\ClientInterface;
use Hiap\Selfwork\Config\Config;
use Hiap\Selfwork\Enum\Url;
use Psr\Http\Message\ResponseInterface;

class Client extends ClientBase
{
    public ElectronicDocumentManagement $edo;

    public SelfEmployed $selfEmployed;

    public Statistics $statistics;

    public Payouts $payouts;

    public Common $common;

    public Tax $tax;

    public function __construct(
        protected Config          $config,
        protected ClientInterface $client,
    ) {
        $this->selfEmployed = new SelfEmployed($this->config, $this->client);
        $this->statistics = new Statistics($this->config, $this->client);
        $this->payouts = new Payouts($this->config, $this->client);
        $this->common = new Common($this->config, $this->client);
        $this->edo = new ElectronicDocumentManagement($this->config, $this->client);
        $this->tax = new Tax($this->config, $this->client);

        parent::__construct($this->config, $this->client);
    }

    /**
     * Проверка доступности API
     *
     * <code>
     *     $clientFactory = new ClientFactory();
     *     $client = $clientFactory->build(new Config(
     *         'login',
     *         'password',
     *     ));
     *
     *     $client->check();
     * </code>
     *
     * @return ResponseInterface
     *
     * @throws ClientException
     *
     * @see https://docs.selfwork.ru/api/autentifikaciya
     */
    public function check(): ResponseInterface
    {
        return $this->get(Url::CHECK);
    }
}
