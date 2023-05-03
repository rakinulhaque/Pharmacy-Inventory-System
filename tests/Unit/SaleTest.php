<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/sale-view');

        $response->assertStatus(200)
            ->assertViewIs('sale_view');
    }

    public function testDelete()
    {
        $purchase = Purchase::factory()->create([
            'product_quantity' => 10
        ]);

        $order = Order::factory()->create([
            'product_code' => $purchase->id,
            'product_quantity' => 5
        ]);

        $response = $this->post('/sale-view/delete', ['order_id' => $order->id]);

        $response->assertRedirect('/sale-view');

        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
        $updatedPurchase = Purchase::find($purchase->id);
        $this->assertEquals(15, $updatedPurchase->product_quantity);
    }

    public function testAdd()
    {
        $purchase = Purchase::factory()->create([
            'product_quantity' => 10
        ]);

        $requestData = [
            'product_code' => $purchase->id,
            'product_quantity' => 5
        ];

        $response = $this->post('/sale-view/add', $requestData);

        $response->assertRedirect('/sale-view');

        $this->assertDatabaseHas('orders', [
            'product_code' => $purchase->id,
            'product_quantity' => 5
        ]);

        $updatedPurchase = Purchase::find($purchase->id);
        $this->assertEquals(5, $updatedPurchase->product_quantity);
    }
}