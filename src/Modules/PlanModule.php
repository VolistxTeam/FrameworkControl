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

    public function FindPlansByName(string $name)
    {
        return $this->GetAll(1, 1, "search=name:$name");
    }

    public function FindPlanByTag(string $tag)
    {
        return $this->GetAll(1, 1, "search=tag:$tag");
    }
}
