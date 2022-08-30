<?php

namespace Volistx\FrameworkControl\Traits;

use Volistx\FrameworkControl\Modules\AdminLogModule;
use Volistx\FrameworkControl\Modules\PersonalTokensModule;
use Volistx\FrameworkControl\Modules\PlanModule;
use Volistx\FrameworkControl\Modules\SubscriptionModule;
use Volistx\FrameworkControl\Modules\UserLogModule;

trait HasKernelFunctions
{
    public function Plan()
    {
        return new PlanModule($this->base_url, $this->access_key);
    }

    public function Subscription()
    {
        return new SubscriptionModule($this->base_url, $this->access_key);
    }

    public function AdminLog()
    {
        return new AdminLogModule($this->base_url, $this->access_key);
    }

    public function UserLog()
    {
        return new UserLogModule($this->base_url, $this->access_key);
    }

    public function PersonalToken(string $subscription_id)
    {
        return new PersonalTokensModule($this->base_url, $this->access_key, $subscription_id);
    }
}
