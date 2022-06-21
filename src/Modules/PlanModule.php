<?php

namespace Volistx\FrameworkControl\Modules;

class PlanModule extends FullModuleBase
{
    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = "$baseUrl/sys-bin/admin/plans";
        $this->token = $token;
    }
}
