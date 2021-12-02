<?php

namespace Aircms;

use Exception;
use Aircms\Requests;
use GuzzleHttp\Client;

class Aircms
{
    /**
     * @var string
     */
    CONST BASE_API_URL = 'https://aircms.test/api/v1/';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::BASE_API_URL,
        ]);
    }

    public function setApiKey(string $apiKey): static
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    public function request($request): array
    {
        $response = $this->client->request('GET', $request->endpoint(), [
            'verify' => false,
            'query' => method_exists($request, 'params') ? $request->params() : [],
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ],
        ]);

        if (! $this->apiKey) {
            throw new Exception('Aircms api key is not set.');
        }

        return $request->response(json_decode($response->getBody()->getContents(), true));
    }

    public function getPages(): array
    {
        return $this->request(new Requests\PagesRequest);
    }

    public function getPage(string $pageName): array
    {
        return $this->request(new Requests\PageRequest($pageName));
    }

    public function getPageFields(string $pageName, array $params = []): array
    {
        return $this->request(new Requests\PageFieldsRequest($pageName, $params));
    }
}
