<?php

namespace Volistx\FrameworkControl\Projects;

use Volistx\FrameworkControl\Helpers\RequestHelper;

class SubscriptionModule
{
    private $requestHelper;

    public function __construct(RequestHelper $requestHelper)
    {
        $this->requestHelper = $requestHelper;
    }

    public function CreateSubscription(int $userID, string $planID, string $activatedAt, string $expiresAt = null)
    {
        $dataArray = [
            'user_id'           => $userID,
            'plan_id'           => $planID,
            'plan_activated_at' => $activatedAt,
        ];

        if ($expiresAt !== null) {
            $dataArray['plan_expires_at'] = $expiresAt;
        }

        return $this->requestHelper->Post('/sys-bin/admin/subscriptions', $dataArray);
    }

    public function UpdateSubscription(string $id, string $planID = null, string $activatedAt = null, string $expiresAt = null, string $hmacToken = null)
    {
        $dataArray = [];

        if ($planID !== null) {
            $dataArray['plan_id'] = $planID;
        }

        if ($activatedAt !== null) {
            $dataArray['plan_activated_at'] = $activatedAt;
        }

        if ($expiresAt !== null) {
            $dataArray['plan_expires_at'] = $expiresAt;
        }

        if ($expiresAt !== null) {
            $dataArray['hmac_token'] = $hmacToken;
        }

        return $this->requestHelper->Put("/sys-bin/admin/subscriptions/$id", $dataArray);
    }

    public function DeleteSubscription(string $id)
    {
        return $this->requestHelper->Delete("/sys-bin/admin/subscriptions/$id");
    }

    public function GetSubscription(string $id)
    {
        return $this->requestHelper->Get("/sys-bin/admin/subscriptions/$id");
    }

    public function GetSubscriptions($page = 1, $limit = 50, $search = null)
    {
        $dataArray = [];
        $dataArray['page'] = $page;
        $dataArray['limit'] = $limit;

        if ($search !== null) {
            $dataArray['search'] = $search;
        }

        return $this->requestHelper->Get('/sys-bin/admin/subscriptions', $dataArray);
    }

    public function GetSubscriptionLogs($id, $page = 1, $limit = 50, $search = null)
    {
        $dataArray = [];
        $dataArray['page'] = $page;
        $dataArray['limit'] = $limit;

        if ($search !== null) {
            $dataArray['search'] = $search;
        }

        return $this->requestHelper->Get("/sys-bin/admin/subscriptions/$id/logs", $dataArray);
    }

    public function GetSubscriptionUsages($id, $date, $mode = null)
    {
        $dataArray = [];
        $dataArray['date'] = $date;

        if ($mode !== null) {
            $dataArray['mode'] = $mode;
        }

        return $this->requestHelper->Get("/sys-bin/admin/subscriptions/$id/stats", $dataArray);
    }
}
