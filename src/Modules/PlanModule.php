<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Helpers\RequestHelper;

class PlanModule
{
    private $requestHelper;

    public function __construct(RequestHelper $requestHelper)
    {
        $this->requestHelper = $requestHelper;
    }

    public function GetPlans($page = 1, $limit = 50, $search = null)
    {
        $query = array();
        $query['page'] = $page;
        $query['limit'] = $limit;

        if (is_string($search)) {
            $query['search'] = $search;
        }

        return $this->requestHelper->Get('/sys-bin/admin/plans', $query);
    }

    public function GetPlan(string $id)
    {
        return $this->requestHelper->Get("/sys-bin/admin/plans/$id");
    }

    public function DeletePlan(string $id)
    {
        return $this->requestHelper->Delete("/sys-bin/admin/plans/$id");
    }

    public function CreatePlan(string $name, string $description, array $data)
    {
        return $this->requestHelper->Post('/sys-bin/admin/plans', [
            'name'        => $name,
            'description' => $description,
            'data'        => $data,
        ]);
    }
}
