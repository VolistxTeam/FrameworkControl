<?php

namespace Volistx\FrameworkControl\Modules;

class AdminLogModule extends PartialModuleBase
{
    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = $baseUrl.'/sys-bin/admin/logs';
        $this->token = $token;
    }
}
