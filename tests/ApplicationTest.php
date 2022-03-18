<?php

use PHPUnit\Framework\TestCase;

final class ApplicationTest extends TestCase
{
    public function testGetPlans(): void
    {
        $application = new Volistx\FrameworkControl\FrameworkControl('http://localhost:8080', 'JHwRpDsLYXmWJth7cr9fnj0gnc2PK5xx42V6gDenROVnfHLFPbu8Pkll2c4tP8Lv');
        $plans = $application->GetPlans();

        $this->assertSame(200, $plans->getStatusCode());
    }
}