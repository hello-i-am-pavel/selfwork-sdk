<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client;

use GuzzleHttp\ClientInterface;
use Hiap\Selfwork\Config\Config;
use Hiap\Selfwork\Enum\Url;
use JsonException;
use Psr\Http\Message\ResponseInterface;

abstract class ClientBase
{
    public function __construct(
        protected Config          $config,
        protected ClientInterface $client,
    ) {
    }

    protected function get(Url $url, array $queryParams = [], array $pathParams = []): ResponseInterface
    {
        return $this->client->get($this->buildUrl($url, $queryParams, $pathParams), [
            'headers' => $this->getHeaders(),
        ]);
    }

    /**
     * @throws JsonException
     */
    protected function post(
        Url   $url,
        array $body = null,
        array $queryParams = [],
        array $pathParams = []
    ) {
        $requestParams = [
            'headers' => $this->getHeaders(),
        ];

        if ($body !== null) {
            $requestParams['body'] = json_encode($body, JSON_THROW_ON_ERROR);
        }

        return $this->client->post($this->buildUrl($url, $queryParams, $pathParams), $requestParams);
    }

    private function getHeaders(): array
    {
        return [
            'X-Login' => $this->config->getLogin(),
            'X-Password' => $this->config->getEncryptedPassword()
        ];
    }

    private function buildUrl(Url $url, array $queryParams = [], array $pathParams = []): string
    {
        $resultUrl = $url->value;

        if (count($pathParams) > 0) {
            $resultUrl = str_replace(array_keys($pathParams), array_values($pathParams), $resultUrl);
        }

        if (count($queryParams) > 0) {
            $resultUrl .= '?' . http_build_query($queryParams);
        }

        return $resultUrl;
    }

    /**
     * @throws JsonException
     */
    protected function getResponseJson(ResponseInterface $response)
    {
        $result = $response->getBody()->getContents();

        return json_decode($result, true, 512, JSON_THROW_ON_ERROR);
    }
}
