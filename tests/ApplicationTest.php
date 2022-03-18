<?php

use PHPUnit\Framework\TestCase;

final class ApplicationTest extends TestCase
{
    private $secretKey = 'JHwRpDsLYXmWJth7cr9fnj0gnc2PK5xx42V6gDenROVnfHLFPbu8Pkll2c4tP8Lv';

    public function testGetPlans(): void
    {
        $application = new Volistx\FrameworkControl\FrameworkControl('http://localhost:8080', $this->secretKey);
        $plans = $application->GetPlans();

        $this->assertSame(200, $plans->getStatusCode());
    }

    public function testGetSubscriptions(): void
    {
        $application = new Volistx\FrameworkControl\FrameworkControl('http://localhost:8080', $this->secretKey);
        $subscriptions = $application->GetSubscriptions();

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
        $adminLogs = $application->GetSubscription('2769fc59-c976-44e7-b9d2-1b2b2f3f117');

        ray($adminLogs);
        $this->assertSame(200, $adminLogs->getStatusCode());
    }
}