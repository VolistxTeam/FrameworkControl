<?php

namespace Volistx\FrameworkControl\Instances;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class ProcessedResponse
{
    public bool $error = false;
    public ?int $status_code;
    public ?array $headers;
    public mixed $body;

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

        if ($response instanceof (BadResponseException::class)) {
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
}
