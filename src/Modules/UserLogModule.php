<?php

namespace Volistx\FrameworkControl\Modules;

class UserLogModule extends PartialModuleBase
{
    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = $baseUrl.'/sys-bin/admin/user-logs';
        $this->token = $token;
    }
}
