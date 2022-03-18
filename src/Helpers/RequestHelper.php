<?php

namespace Volistx\FrameworkControl\Helpers;

use GuzzleHttp\Client;

class RequestHelper {
    private $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }
}