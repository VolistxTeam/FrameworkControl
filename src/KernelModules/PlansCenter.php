<?php

namespace Volistx\FrameworkControl\KernelModules;

use Volistx\FrameworkControl\Facades\Requests;

class PlansCenter
{
    private string $baseUrl;
    private string $token;

    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = $baseUrl.'/sys-bin/admin/plans';
        $this->token = $token;
    }

    public function GetPlan(string $id)
    {
        return Requests::Get($this->baseUrl.'/'.$id, $this->token, []);
    }

    public function GetPlans()
    {
        return Requests::Get($this->baseUrl, $this->token, []);
    }

    public function CreatePlan(string $name, string $description, array $data)
    {
        return Requests::Post($this->baseUrl, $this->token, [
            'name'        => $name,
            'description' => $description,
            'data'        => $data,
        ]);
    }
}
