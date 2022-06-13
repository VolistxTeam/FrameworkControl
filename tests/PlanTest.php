<?php

namespace Volistx\FrameworkControl\Tests;

final class PlanTest extends TestCase
{
    public function testCreatePlan(): void
    {
        $testModel = new TestModel();
        $plan = $testModel->Plan()->Create('Test1', 'Test', [
            'requests'   => 150000,
            'rate_limit' => 500,
        ]);

        $this->assertSame(201, $plan->getStatusCode());
    }

    public function testGetPlans(): void
    {
        $testModel = new TestModel();
        $plan = $testModel->Plan()->GetAll();

        $this->assertSame(200, $plan->getStatusCode());
    }

    public function testGetPlan(): void
    {
        $testModel = new TestModel();
        $plan = $testModel->Plan()->Get('941dcced-fdee-4d4c-a9e3-f56dc5d3c280');

        $this->assertSame(200, $plan->getStatusCode());
    }
}
