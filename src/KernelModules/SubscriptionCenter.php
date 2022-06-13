<?php

namespace Volistx\FrameworkControl\KernelModules;

class SubscriptionCenter
{
    private string $baseUrl;
    private string $token;

    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = $baseUrl;
        $this->token = $token;
    }

    public function Create(array $input)
    {
    }
}
