<?php

namespace Volistx\FrameworkControl\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Volistx\FrameworkControl\Instances\ResponseInstance;

class RequestHelper {
    private $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function Get($route, $query = []) {
        try {
            $response = $this->client->request('GET', $route, [
                'json' => $query
            ]);

            return (new ResponseInstance)
                ->setStatusCode($response->getStatusCode())
                ->setHeaders($response->getHeaders())
                ->setBody(json_decode($response->getBody()->getContents(), true));
        } catch (GuzzleException $e) {
            return (new ResponseInstance)
                ->setStatusCode(500)
                ->setHeaders(null)
                ->setBody(null);
        }
    }
}