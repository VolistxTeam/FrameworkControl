<?php

namespace Volistx\FrameworkControl;

use Volistx\FrameworkControl\KernelModules\PlansCenter;
use Volistx\FrameworkControl\KernelModules\SubscriptionCenter;

abstract class Model
{
    protected $baseUrl;
    protected $token;

    public function Plan()
    {
        return new PlansCenter($this->baseUrl, $this->token);
    }

    public function Subscription()
    {
        return new SubscriptionCenter($this->baseUrl, $this->token);
    }
}
