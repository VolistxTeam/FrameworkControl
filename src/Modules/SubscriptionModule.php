<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Facades\Requests;

class SubscriptionModule extends FullModuleBase
{
    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = "$baseUrl/sys-bin/admin/subscriptions";
        $this->token = $token;
    }

    public function GetLogs($id, $page = 1, $limit = 50, $search = '')
    {
        return Requests::Get("$this->baseUrl/$id/logs", $this->token, [
            'page' => $page,
            'limit' => $limit,
            'search' => $search
        ]);
    }

    public function GetUsages($id, $date, $mode)
    {
        return Requests::Get("$this->baseUrl/$id/stats", $this->token, [
            'date' => $date,
            'mode' => $mode
        ]);
    }
}
