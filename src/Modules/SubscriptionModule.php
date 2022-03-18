<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Helpers\RequestHelper;

class SubscriptionModule {
    private $requestHelper;

    public function __construct(RequestHelper $requestHelper)
    {
        $this->requestHelper = $requestHelper;
    }

    public function GetSubscriptions($page = 1)
    {
        return $this->requestHelper->Get('/sys-bin/admin/subscriptions', ['page' => $page]);
    }

    public function GetSubscription(string $id)
    {
        return $this->requestHelper->Get("/sys-bin/admin/subscriptions/$id");
    }

    public function CreateSubscription(int $userID, string $planID, string $activatedAt, string $expiresAt = null) {
        if ($expiresAt === null) {
            $dataArray = [
                'user_id' => $userID,
                'plan_id' => $planID,
                'plan_activated_at' => $activatedAt,
            ];
        } else {
            $dataArray = [
                'user_id' => $userID,
                'plan_id' => $planID,
                'plan_activated_at' => $activatedAt,
                'plan_expires_at' => $expiresAt,
            ];
        }
        return $this->requestHelper->Post('/sys-bin/admin/subscriptions', $dataArray);
    }
}