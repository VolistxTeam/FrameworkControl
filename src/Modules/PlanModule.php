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
        $result = $this->Get($id);

        if ($result->status_code == 200)
            return $result->body;
        return false;
    }

    public function FindPlansByName(string $name)
    {
        $result = $this->GetAll(1, 1, "search=name:$name");

        if ($result->status_code == 200)
            return $result->body->items[0];
        return false;
    }

    public function FindPlanByTag(string $tag)
    {
        $result = $this->GetAll(1, 1, "search=tag:$tag");

        if ($result->status_code == 200)
            return $result->body->items[0];
        return false;
    }
}
