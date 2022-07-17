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

    public function GetTimeUntilExpire($id, string $timeunit = 'day'): float|int|string|bool
    {
        $result = Requests::Get("$this->baseUrl/$id", $this->token);

        if ($result->status_code != 200) {
            return false;
        }

        $expires_at = Requests::Get("$this->baseUrl/$id", $this->token)->body->expires_at;

        return match ($timeunit) {
            'day'    => Carbon::parse($expires_at)->diffInDays(Carbon::now()),
            'second' => Carbon::parse($expires_at)->diffInSeconds(Carbon::now()),
            'minute' => Carbon::parse($expires_at)->diffInMinutes(Carbon::now()),
            'hour'   => Carbon::parse($expires_at)->diffInHours(Carbon::now()),
            'human'  => Carbon::parse($expires_at)->diffForHumans(Carbon::now())
        };
    }

    public function UpgradeSubscriptionPlan($id, string $new_plan_id): bool
    {
        $result = $this->Update(
            $id,
            [
                'plan_id' => $new_plan_id,
            ]
        );

        if ($result->status_code == 200) {
            return true;
        }

        return false;
    }

    public function DowngradeSubscriptionPlan($id, string $new_plan_id)
    {
        // to be discussed
    }

    public function ExtendPlanDuration($id, int $extra_duration, $timeunit = 'day'): bool
    {
        $newExpiryDate = match ($timeunit) {
            'day'    => Carbon::now()->addDays($extra_duration),
            'second' => Carbon::now()->addSeconds($extra_duration),
            'minute' => Carbon::now()->addMinutes($extra_duration),
            'hour'   => Carbon::now()->addHours($extra_duration),
        };

        $result = $this->Update(
            $id,
            [
                'plan_activated_at' => Carbon::now(),
                'plan_expires_at'   => $newExpiryDate,
            ]
        );

        if ($result->status_code == 200) {
            return true;
        }

        return false;
    }

    public function GetPlanSubscriptions(string $plan_id, int $page = 1, int $limit = 50)
    {
        $result = $this->GetAll($page, $limit, "search=plan_id:$plan_id");

        if ($result->status_code == 200) {
            return $result->body;
        }

        return false;
    }

    public function GetLogs($id, $page = 1, $limit = 50, $search = '')
    {
        $result = Requests::Get("$this->baseUrl/$id/logs", $this->token, [
            'page'   => $page,
            'limit'  => $limit,
            'search' => $search,
        ]);

        if ($result->status_code == 200) {
            return $result->body;
        }

        return false;
    }

    public function GetUsages($id, $date, $mode)
    {
        $result = Requests::Get("$this->baseUrl/$id/stats", $this->token, [
            'date' => $date,
            'mode' => $mode,
        ]);

        if ($result->status_code == 200) {
            return $result->body;
        }

        return false;
    }
}
