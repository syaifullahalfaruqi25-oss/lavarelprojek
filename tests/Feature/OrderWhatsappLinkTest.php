<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Property;
use Tests\TestCase;

class OrderWhatsappLinkTest extends TestCase
{
    public function test_order_confirmation_uses_requested_marketing_number(): void
    {
        $property = new Property([
            'name' => 'Perumahan Nusantara',
            'marketing_whatsapp' => '08937375252',
        ]);
        $order = new Order([
            'name' => 'Budi Santoso',
            'code' => 'ORD-20261011-0001',
        ]);
        $order->setRelation('property', $property);

        $html = view('orders.success', compact('order'))->render();

        $this->assertStringContainsString(
            'href="https://wa.me/6289665918077?text=',
            $html,
        );
        $this->assertStringNotContainsString('wa.me/628937375252', $html);
    }
}
