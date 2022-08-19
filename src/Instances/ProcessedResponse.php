<?php

namespace Volistx\FrameworkControl\Instances;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class ProcessedResponse
{
    public ?int $status_code;
    public ?array $headers;
    public mixed $body;

    public function __construct($response)
    {
        if ($response instanceof (ResponseInterface::class)) {
            $this->headers = $response->getHeaders();
            $this->body = json_decode($response->getBody()->getContents(), true);
            $this->status_code = $response->getCode();

            return;
        }

        if ($response instanceof (ClientException::class) || $response instanceof (BadResponseException::class)) {
            $this->headers = $response->getResponse()->getHeaders();
            $this->body = json_decode($response->getResponse()->getBody()->getContents(), true);
            $this->status_code = $response->getCode();

            return;
        }

        if ($response instanceof (GuzzleException::class)) {
            $this->status_code = 500;
            $this->headers = null;
            $this->body = null;
        }
    }
}
