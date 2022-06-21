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
        return Requests::Put("$this->baseUrl/$id/reset", $this->token);
    }

    public function Sync($id)
    {
        return Requests::Post("$this->baseUrl/$id/sync", $this->token);
    }
}
