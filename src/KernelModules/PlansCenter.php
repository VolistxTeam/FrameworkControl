<?php

namespace Volistx\FrameworkControl\KernelModules;

use Volistx\FrameworkControl\Facades\Requests;

class PlansCenter
{
    private string $baseUrl;
    private string $token;

    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = $baseUrl;
        $this->token = $token;
    }

    public function Create(string $name, string $description, array $data)
    {
        return Requests::POST($this->baseUrl, $this->token, [
            'name' => $name,
            'description' => $description,
            'data' => $data,
        ]);
    }
}