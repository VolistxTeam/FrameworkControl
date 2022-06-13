<?php

namespace Volistx\FrameworkControl\Tests;

use Volistx\FrameworkControl\FrameworkControl;

final class SubscriptionTest extends TestCase
{
    private $secretKey = 'itOdGNZsmdY6Y1jer1UgbJoJ94QsiVSV2zLhKww0e0CPb8Ft53mwzEa1DFXz5D7X';

    public function testGetPlans(): void
    {
        $application = new FrameworkControl('http://localhost:8080', $this->secretKey);
        $plans = $application->plan->GetPlans();
        $this->assertSame(200, $plans->getStatusCode());
    }

    public function testGetPlan(): void
    {
        $application = new FrameworkControl('http://localhost:8080', $this->secretKey);
        $plan = $application->plan->GetPlan('e53bb6b8-f116-4917-89e1-9015408604f3');


        $this->assertSame(200, $plan->getStatusCode());
    }

    public function testGetSubscriptions(): void
    {
        $application = new FrameworkControl('http://localhost:8080', $this->secretKey);
        $subscriptions = $application->subscription->GetSubscriptions();

        $this->assertSame(200, $subscriptions->getStatusCode());
    }

    public function testGetAdminLogs(): void
    {
        $application = new FrameworkControl('http://localhost:8080', $this->secretKey);
        $adminLogs = $application->adminLog->GetAdminLogs();

        $this->assertSame(200, $adminLogs->getStatusCode());
    }

    public function testGetSubscription(): void
    {
        $application = new FrameworkControl('http://localhost:8080', $this->secretKey);
        $subscription = $application->subscription->GetSubscription('e53bb6b8-f116-4917-89e1-9015408604f3');

        $this->assertSame(200, $subscription->getStatusCode());
    }

    public function testCreatePlan(): void
    {
        $application = new FrameworkControl('http://localhost:8080', $this->secretKey);
        $plan = $application->plan->CreatePlan('Test Plan', 'No Idea', [
            'requests'   => '150000',
            'rate_limit' => '300',
        ]);

        $this->assertSame(201, $plan->getStatusCode());
    }

    public function testCreateSubscription(): void
    {
        $application = new FrameworkControl('http://localhost:8080', $this->secretKey);
        $subscription = $application->subscription->CreateSubscription(1, '8cc033ba-743f-46c4-be21-fe08dc98a7b8', date('Y-m-d H:i:s'), date('Y-m-d H:i:s', strtotime('+1 month')));

        $this->assertSame(201, $subscription->getStatusCode());
    }

    public function testUpdateSubscription(): void {
        $application = new FrameworkControl('http://localhost:8080', $this->secretKey);
        $subscription = $application->subscription->UpdateSubscription('d5111d47-4e91-4929-8ca5-1409573a8a1f', '8cc033ba-743f-46c4-be21-fe08dc98a7b8', '2020-01-01 00:00:00', '2020-02-01 00:00:00');

        $this->assertSame(201, $subscription->getStatusCode());
    }
    public function testDeletePlan(): void
    {
        $application = new FrameworkControl('http://localhost:8080', $this->secretKey);
        $plan = $application->plan->DeletePlan('e53bb6b8-f116-4917-89e1-9015408604f3');

        $this->assertSame(204, $plan->getStatusCode());
    }
}
