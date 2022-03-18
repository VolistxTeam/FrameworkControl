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
        $plans = $application->GetSubscriptions(2);

        ray($plans);
        $this->assertSame(200, $plans->getStatusCode());
    }
}