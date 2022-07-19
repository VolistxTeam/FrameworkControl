<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Facades\Requests;

class PersonalTokensModule extends FullModuleBase
{
    public function __construct(string $baseUrl, string $token, string $subscription_id)
    {
        $this->baseUrl = "$baseUrl/sys-bin/admin/subscriptions/$subscription_id";
        $this->token = $token;
    }

    public function Reset($id)
    {
        $result = Requests::Put("$this->baseUrl/$id/reset", $this->token);

        if ($result->status_code == 200) {
            return true;
        }

        return false;
    }

    public function Sync()
    {
        $result = Requests::Post("$this->baseUrl/personal-tokens/sync", $this->token);

        if ($result->status_code == 201) {
            return $result->body;
        }

        return false;
    }
}
