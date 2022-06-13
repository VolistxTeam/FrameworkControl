<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Helpers\RequestHelper;

class AdminLogModule
{
    private $requestHelper;

    public function __construct(RequestHelper $requestHelper)
    {
        $this->requestHelper = $requestHelper;
    }

    public function GetAdminLogs($page = 1)
    {
        return $this->requestHelper->Get('/sys-bin/admin/logs', ['page' => $page]);
    }
}