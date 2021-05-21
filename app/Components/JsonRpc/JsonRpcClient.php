<?php

declare(strict_types=1);

namespace App\Components\JsonRpc;

use GuzzleHttp\{
    Client,
    RequestOptions
};

class JsonRpcClient
{
    public const JSON_RPC_VERSION = '2.0';
    public const METHOD_URI = '/api/v1/data';

    public function __construct(
        protected Client $client,
        protected string $basePath = '',
    )
    {
        $this->client = new Client([
            'headers'  => ['Content-Type' => 'application/json'],
            'base_uri' => env('BASE_URI'),
        ]);
    }

    public function send(string $method, array $params): array
    {
        $response = $this->client
            ->post(self::METHOD_URI, [
                RequestOptions::JSON => [
                    'jsonrpc' => self::JSON_RPC_VERSION,
                    'id'      => time(),
                    'method'  => $method,
                    'params'  => $params
                ]
            ])->getBody()->getContents();

        return json_decode($response, true);
    }
}
