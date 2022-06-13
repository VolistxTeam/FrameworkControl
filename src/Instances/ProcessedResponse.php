<?php

namespace Volistx\FrameworkControl\Instances;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class ProcessedResponse
{
    private bool $error = false;
    private ?int $statusCode;
    private ?array $headers;
    private ?array $body;

    public function __construct($response)
    {
        if ($response instanceof (ResponseInterface::class)) {
            $this->statusCode = $response->getStatusCode();
            $this->headers = $response->getHeaders();
            $this->body = json_decode($response->getBody()->getContents(), true);
            $this->error = false;
        }

        if ($response instanceof (ClientException::class)) {
            $this->error = true;
            $this->statusCode = $response->getCode();
            $this->headers = $response->getResponse()->getHeaders();
            $this->body = json_decode($response->getResponse()->getBody()->getContents(), true);
        }

        if ($response instanceof (GuzzleException::class)) {
            $this->error = true;
            $this->statusCode = $response->getCode();
            $this->headers = null;
            $this->body = null;
        }
    }
}
