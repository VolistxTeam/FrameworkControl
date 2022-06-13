<?php

namespace Volistx\FrameworkControl\Projects;

use Volistx\FrameworkControl\Facades\Requests;
use Volistx\FrameworkControl\Helpers\RequestHelper;
use Volistx\FrameworkControl\KernelModules\PlansCenter;

class BINPoint
{
    private string $baseUrl = '/sys-bin/admin/plans';
    private string $token;

    public function __construct($baseUrl,$token)
    {
        $this->baseUrl = $baseUrl;
        $this->token = $token;
    }

//
//    public function GetPlans($page = 1, $limit = 50, $search = null)
//    {
//        $query = [];
//        $query['page'] = $page;
//        $query['limit'] = $limit;
//
//        if (is_string($search)) {
//            $query['search'] = $search;
//        }
//
//        return $this->requestHelper->Get('/sys-bin/admin/plans', $query);
//    }
//
//    public function GetPlan(string $id)
//    {
//        return $this->requestHelper->Get("/sys-bin/admin/plans/$id");
//    }
//
//    public function DeletePlan(string $id)
//    {
//        return $this->requestHelper->Delete("/sys-bin/admin/plans/$id");
//    }

    public function Plans()
    {
        return new PlansCenter($this->baseUrl,$this->token);
    }
}
