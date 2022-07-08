<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Facades\Requests;

abstract class PartialModuleBase
{
    protected string $baseUrl;
    protected string $token;

    public function Get(string $id)
    {
        $result = Requests::Get("$this->baseUrl/$id", $this->token);

        if ($result->status_code == 200)
            return $result->body;
        return false;
    }

    public function GetAll($page = 1, $limit = 50, $search = '')
    {
        $result = Requests::Get($this->baseUrl, $this->token, [
            'page' => $page,
            'limit' => $limit,
            'search' => $search,
        ]);

        if ($result->status_code == 200)
            return $result->body;
        return false;
    }
}
