<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Facades\Requests;

class AdminLogModule
{
    private string $baseUrl;
    private string $token;

    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = $baseUrl.'/sys-bin/admin/logs';
        $this->token = $token;
    }

    public function GetAll($page = 1, $limit = 50, $search = null)
    {
        $dataArray = [];
        $dataArray['page'] = $page;
        $dataArray['limit'] = $limit;

        if ($search !== null) {
            $dataArray['search'] = $search;
        }

        return Requests::Get($this->baseUrl, $this->token, $dataArray);
    }
}
