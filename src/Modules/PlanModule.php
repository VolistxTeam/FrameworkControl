<?php

namespace Volistx\FrameworkControl\Modules;

class PlanModule extends FullModuleBase
{
    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = "$baseUrl/sys-bin/admin/plans";
        $this->token = $token;
    }

    public function FindById(string $id)
    {
        return $this->Get($id);
    }

    public function FindByName(string $name)
    {
        return $this->GetAll(1, 1, "search=name:$name")[0];
    }

    public function GetSubscriptions(string $plan_id, int $page = 1, int $limit = 50)
    {
        return $this->GetAll($page, $limit, "search=plan_id:$plan_id");
    }
}
