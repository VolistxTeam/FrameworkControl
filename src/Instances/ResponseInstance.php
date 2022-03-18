<?php

namespace Volistx\FrameworkControl\Instances;

class ResponseInstance {
    private int $statusCode;
    private array $headers;
    private array $body;

    public function setStatusCode(int $statusCode) {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function setHeaders(array $headers) {
        $this->headers = $headers;

        return $this;
    }

    public function setBody(array $body) {
        $this->body = $body;

        return $this;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function getBody() {
        return $this->body;
    }
}

