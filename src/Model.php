<?php

namespace Volistx\FrameworkControl;

use Volistx\FrameworkControl\Modules\AdminLogModule;
use Volistx\FrameworkControl\Modules\PlanModule;
use Volistx\FrameworkControl\Modules\SubscriptionModule;

abstract class Model
{
    protected $baseUrl;
    protected $token;

    public function Plan()
    {
        return new PlanModule($this->baseUrl, $this->token);
    }

    public function Subscription()
    {
        return new SubscriptionModule($this->baseUrl, $this->token);
    }

    public function AdminLog()
    {
        return new AdminLogModule($this->baseUrl, $this->token);
    }
}
