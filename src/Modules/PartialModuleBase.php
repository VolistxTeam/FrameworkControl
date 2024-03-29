<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Facades\Requests;

abstract class PartialModuleBase
{
    protected string $baseUrl;
    protected string $token;

    public function Get(string $id)
    {
        return Requests::Get("$this->baseUrl/$id", $this->token);
    }

    public function GetAll($page = 1, $limit = 50, $search = '')
    {
        return Requests::Get($this->baseUrl, $this->token, [
            'page'   => $page,
            'limit'  => $limit,
            'search' => $search,
        ]);
    }
}
