<?php

use PHPUnit\Framework\TestCase;

final class ApplicationTest extends TestCase
{
    private $secretKey = 'JHwRpDsLYXmWJth7cr9fnj0gnc2PK5xx42V6gDenROVnfHLFPbu8Pkll2c4tP8Lv';

    public function testGetPlans(): void
    {
        $application = new Volistx\FrameworkControl\FrameworkControl('http://localhost:8080', $this->secretKey);
        $plans = $application->plan->GetPlans();

        $this->assertSame(200, $plans->getStatusCode());
    }

    public function testGetPlan(): void
    {
        $application = new Volistx\FrameworkControl\FrameworkControl('http://localhost:8080', $this->secretKey);
        $plan = $application->plan->GetPlan('c823bb49-ae87-4d4e-85f6-00b97d672af3');

        $this->assertSame(200, $plan->getStatusCode());
    }

    public function testGetSubscriptions(): void
    {
        $application = new Volistx\FrameworkControl\FrameworkControl('http://localhost:8080', $this->secretKey);
        $subscriptions = $application->subscription->GetSubscriptions();

        $this->assertSame(200, $subscriptions->getStatusCode());
    }

    public function testGetAdminLogs(): void
    {
        $application = new Volistx\FrameworkControl\FrameworkControl('http://localhost:8080', $this->secretKey);
        $adminLogs = $application->GetAdminLogs();

        $this->assertSame(200, $adminLogs->getStatusCode());
    }

    public function testGetSubscription(): void
    {
        $application = new Volistx\FrameworkControl\FrameworkControl('http://localhost:8080', $this->secretKey);
        $subscription = $application->subscription->GetSubscription('2769fc59-c976-44e7-b9d2-1b2b2f3f117d');

        $this->assertSame(200, $subscription->getStatusCode());
    }

    public function testCreatePlan(): void
    {
        $application = new Volistx\FrameworkControl\FrameworkControl('http://localhost:8080', $this->secretKey);
        $plan = $application->plan->CreatePlan('Test Plan', 'No Idea', [
            'requests'   => '150000',
            'rate_limit' => '300',
        ]);

        $this->assertSame(201, $plan->getStatusCode());
    }

    public function testCreateSubscription(): void
    {
        $application = new Volistx\FrameworkControl\FrameworkControl('http://localhost:8080', $this->secretKey);
        $subscription = $application->subscription->CreateSubscription(1, 'c823bb49-ae87-4d4e-85f6-00b97d672af3', date('Y-m-d H:i:s'));

        $this->assertSame(201, $subscription->getStatusCode());
    }
}
