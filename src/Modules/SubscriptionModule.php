<?php

namespace Volistx\FrameworkControl\Modules;

use Carbon\Carbon;
use Volistx\FrameworkControl\Facades\Requests;

class SubscriptionModule extends FullModuleBase
{
    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = "$baseUrl/sys-bin/admin/subscriptions";
        $this->token = $token;
    }

    public function GetTimeUntilExpire($id, string $timeunit = 'day')
    {
        $expires_at = Requests::Get("$this->baseUrl/$id", $this->token)->body->expires_at;

        return match ($timeunit) {
            'day'    => Carbon::parse($expires_at)->diffInDays(Carbon::now()),
            'second' => Carbon::parse($expires_at)->diffInSeconds(Carbon::now()),
            'minute' => Carbon::parse($expires_at)->diffInMinutes(Carbon::now()),
            'hour'   => Carbon::parse($expires_at)->diffInHours(Carbon::now()),
            'human'  => Carbon::parse($expires_at)->diffForHumans(Carbon::now())
        };
    }

    public function GetLogs($id, $page = 1, $limit = 50, $search = '')
    {
        return Requests::Get("$this->baseUrl/$id/logs", $this->token, [
            'page'   => $page,
            'limit'  => $limit,
            'search' => $search,
        ]);
    }

    public function GetUsages($id, $date, $mode)
    {
        return Requests::Get("$this->baseUrl/$id/stats", $this->token, [
            'date' => $date,
            'mode' => $mode,
        ]);
    }
}
