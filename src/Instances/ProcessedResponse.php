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
        $this->status_code = $response->getCode();

        if ($response instanceof (ResponseInterface::class)) {
            $this->headers = $response->getHeaders();
            $this->body = json_decode($response->getBody()->getContents(), true);

            return;
        }

        if ($response instanceof (ClientException::class) || $response instanceof (BadResponseException::class)) {
            $this->headers = $response->getResponse()->getHeaders();
            $this->body = json_decode($response->getResponse()->getBody()->getContents(), true);

            return;
        }

        if ($response instanceof (GuzzleException::class)) {
            $this->headers = null;
            $this->body = null;
        }
    }
}
