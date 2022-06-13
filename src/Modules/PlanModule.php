<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Facades\Requests;

class PlanModule
{
    private string $baseUrl;
    private string $token;

    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = $baseUrl.'/sys-bin/admin/plans';
        $this->token = $token;
    }

    public function Get(string $id)
    {
        return Requests::Get($this->baseUrl.'/'.$id, $this->token, []);
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

    public function Create(string $name, string $description, array $data)
    {
        return Requests::Post($this->baseUrl, $this->token, [
            'name'        => $name,
            'description' => $description,
            'data'        => $data,
        ]);
    }
}
