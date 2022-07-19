<?php

namespace Volistx\FrameworkControl\Instances;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class ProcessedResponse
{
    private bool $error = false;
    private ?int $status_code;
    private ?array $headers;
    private mixed $body;

    public function __construct($response)
    {
        if ($response instanceof (ResponseInterface::class)) {
            $this->status_code = $response->getStatusCode();
            $this->headers = $response->getHeaders();
            $this->body = json_decode($response->getBody()->getContents(), true);
            $this->error = false;
        }

        if ($response instanceof (ClientException::class)) {
            $this->error = true;
            $this->status_code = $response->getCode();
            $this->headers = $response->getResponse()->getHeaders();
            $this->body = json_decode($response->getResponse()->getBody()->getContents(), true);
        }

        if ($response instanceof (GuzzleException::class)) {
            $this->error = true;
            $this->status_code = $response->getCode();
            $this->headers = null;
            $this->body = null;
        }
    }

    public function isError(): bool
    {
        return $this->error;
    }

    public function getStatusCode(): ?int
    {
        return $this->status_code;
    }

    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    public function getBody(): ?array
    {
        return $this->body;
    }
}
