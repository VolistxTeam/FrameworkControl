<?php

namespace Volistx\FrameworkControl;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Volistx\FrameworkControl\Helpers\RequestHelper;
use Volistx\FrameworkControl\Instances\ResponseInstance;

class FrameworkControl
{
    private $url;

    private $secretKey;

    private $guzzleInstance;

    private $requestHelper;

    public function __construct(string $url, string $secretKey)
    {
        $this->url = $url;
        $this->secretKey = $secretKey;

        $this->guzzleInstance = new Client([
            'base_uri' => $this->url,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->secretKey,
            ],
        ]);

        $this->requestHelper = new RequestHelper($this->guzzleInstance);
    }

    public function GetPlans($page = 1)
    {
        return $this->requestHelper->Get('/sys-bin/admin/plans', ['page' => $page]);
    }

    public function GetPlan(string $id)
    {
        return $this->requestHelper->Get("/sys-bin/admin/plans/$id");
    }

    public function GetSubscriptions($page = 1)
    {
        return $this->requestHelper->Get('/sys-bin/admin/subscriptions', ['page' => $page]);
    }

    public function GetAdminLogs($page = 1)
    {
        return $this->requestHelper->Get('/sys-bin/admin/logs', ['page' => $page]);
    }

    public function GetSubscription(string $id)
    {
        return $this->requestHelper->Get("/sys-bin/admin/subscriptions/$id");
    }

    public function CreatePlan(string $name, string $description, array $data) {
        return $this->requestHelper->Post('/sys-bin/admin/plans', [
            'name' => $name,
            'description' => $description,
            'data' => $data,
        ]);
    }
}