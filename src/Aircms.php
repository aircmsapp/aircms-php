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
    CONST BASE_API_URL = 'https://aircms.app/api/v1/';

    /**
     * @var string
     */
    protected $token;

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

    public function setAuthToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }

    public function request($request): array
    {
        $response = $this->client->request('GET', $request->endpoint(), [
            'query' => method_exists($request, 'params') ? $request->params() : [],
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'application/json',
            ],
        ]);

        if (! $this->token) {
            throw new Exception('Aircms auth token missing.');
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
