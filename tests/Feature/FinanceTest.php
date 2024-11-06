<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FinanceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_payment_method_assignment_to_event()
    {
        $event = Event::factory()->create();
        $paymentMethod = PaymentMethod::factory()->create();
        $company = Company::factory()->create();

        $response = $this->post(route('finance.storePayment'), [
            'event_id' => $event->id,
            'payment_method_id' => $paymentMethod->id,
            'company_id' => $company->id,
            'vat_rate' => 20.00,
        ]);

        $response->assertRedirect();  // Assuming it redirects to an event page
    }
}
