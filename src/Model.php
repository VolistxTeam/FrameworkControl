<?php

namespace Volistx\FrameworkControl;

use Volistx\FrameworkControl\KernelModules\PlansCenter;

abstract class Model
{
    protected $baseUrl;
    protected $token;

    public function Plans()
    {
        return new PlansCenter($this->baseUrl, $this->token);
    }
}
