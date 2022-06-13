<?php

namespace Volistx\FrameworkControl\Helpers;

use Exception;
use GuzzleHttp\Client;
use Volistx\FrameworkControl\Instances\ProcessedResponse;

class RequestsCenter
{
    private Client $client;

    public function POST($url, $token, array $inputs): ProcessedResponse
    {
        try {
            $response = $this->client->post($url, [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($inputs),
            ]);
            return new ProcessedResponse($response);
        } catch (Exception $ex) {
            return new ProcessedResponse($ex);
        }
    }
}