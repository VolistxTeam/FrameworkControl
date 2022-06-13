<?php

namespace Volistx\FrameworkControl;

use GuzzleHttp\Client;
use Volistx\FrameworkControl\Helpers\RequestHelper;
use Volistx\FrameworkControl\Modules\AdminLogModule;
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

    public $adminLog;

    public function __construct(string $url, string $secretKey)
    {
        $this->url = $url;
        $this->secretKey = $secretKey;

        $this->guzzleInstance = new Client([
            'base_uri' => $this->url,
            'headers'  => [
                'Authorization' => 'Bearer '.$this->secretKey,
            ],
        ]);

        $this->requestHelper = new RequestHelper($this->guzzleInstance);
        $this->subscription = new SubscriptionModule($this->requestHelper);
        $this->plan = new PlanModule($this->requestHelper);
        $this->adminLog = new AdminLogModule($this->requestHelper);
    }
}
