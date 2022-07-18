<?php

namespace Volistx\FrameworkControl\Traits;

use Volistx\FrameworkControl\Modules\AdminLogModule;
use Volistx\FrameworkControl\Modules\PersonalTokensModule;
use Volistx\FrameworkControl\Modules\PlanModule;
use Volistx\FrameworkControl\Modules\SubscriptionModule;

trait HasProductFunctions
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

    public function PersonalToken(string $id)
    {
        return new PersonalTokensModule($this->base_url, $this->access_key, $id);
    }
}
