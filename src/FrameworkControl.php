<?php

namespace Volistx\FrameworkControl;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Volistx\FrameworkControl\Helpers\RequestHelper;
use Volistx\FrameworkControl\Instances\ResponseInstance;
use Volistx\FrameworkControl\Modules\PlanModule;
use Volistx\FrameworkControl\Modules\SubscriptionModule;

class FrameworkControl
{
    private $url;

    private $secretKey;

    private $guzzleInstance;

    private $requestHelper;

    public $subscription;

    public $plan;

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
        $this->subscription = new SubscriptionModule($this->requestHelper);
        $this->plan = new PlanModule($this->requestHelper);
    }

    public function GetAdminLogs($page = 1)
    {
        return $this->requestHelper->Get('/sys-bin/admin/logs', ['page' => $page]);
    }
}