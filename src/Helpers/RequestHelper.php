<?php

namespace Volistx\FrameworkControl\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Volistx\FrameworkControl\Instances\ResponseInstance;

class RequestHelper
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function Get($route, $query = [])
    {
        try {
            $response = $this->client->request('GET', $route, [
                'query' => $query,
            ]);

            return (new ResponseInstance())
                ->setStatusCode($response->getStatusCode())
                ->setHeaders($response->getHeaders())
                ->setBody(json_decode($response->getBody()->getContents(), true));
        } catch (ClientException $e) {
            return (new ResponseInstance())
                ->setError(true)
                ->setStatusCode($e->getCode())
                ->setHeaders($e->getResponse()->getHeaders())
                ->setBody(json_decode($e->getResponse()->getBody()->getContents(), true));
        } catch (GuzzleException $e) {
            return (new ResponseInstance())
                ->setError(true)
                ->setStatusCode($e->getCode())
                ->setHeaders(null)
                ->setBody(null);
        }
    }

    public function Post($route, $array = [])
    {
        try {
            $response = $this->client->request('POST', $route, [
                'json' => $array,
            ]);

            return (new ResponseInstance())
                ->setStatusCode($response->getStatusCode())
                ->setHeaders($response->getHeaders())
                ->setBody(json_decode($response->getBody()->getContents(), true));
        } catch (ClientException $e) {
            return (new ResponseInstance())
                ->setError(true)
                ->setStatusCode($e->getCode())
                ->setHeaders($e->getResponse()->getHeaders())
                ->setBody(json_decode($e->getResponse()->getBody()->getContents(), true));
        } catch (GuzzleException $e) {
            return (new ResponseInstance())
                ->setError(true)
                ->setStatusCode($e->getCode())
                ->setHeaders(null)
                ->setBody(null);
        }
    }

    public function Delete($route, $array = [])
    {
        try {
            $response = $this->client->request('DELETE', $route, [
                'query' => $array,
            ]);

            return (new ResponseInstance())
                ->setStatusCode($response->getStatusCode())
                ->setHeaders($response->getHeaders())
                ->setBody(json_decode($response->getBody()->getContents(), true));
        } catch (ClientException $e) {
            return (new ResponseInstance())
                ->setError(true)
                ->setStatusCode($e->getCode())
                ->setHeaders($e->getResponse()->getHeaders())
                ->setBody(json_decode($e->getResponse()->getBody()->getContents(), true));
        } catch (GuzzleException $e) {
            return (new ResponseInstance())
                ->setError(true)
                ->setStatusCode($e->getCode())
                ->setHeaders(null)
                ->setBody(null);
        }
    }
}