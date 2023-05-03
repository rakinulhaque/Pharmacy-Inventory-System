<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Purchase;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Supplier;

class PurchaseControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $brand = Brand::factory()->create();
        $product = Product::factory()->create();
        $supplier = Supplier::factory()->create();

        $response = $this->get('/purchase');

        $response->assertStatus(200);
        $response->assertViewHas('brand');
        $response->assertViewHas('product');
        $response->assertViewHas('supplier');
    }

    public function testStore()
    {
        $purchaseData = [
            'product_name' => 'Product 1',
            'supplier_name' => 'Supplier 1',
            'product_quantity' => 10,
            'purchase_price' => 100,
            'sale_price' => 150,
        ];

        $response = $this->post('/purchase', $purchaseData);

        $response->assertRedirect('/stoke');
        $this->assertDatabaseHas('purchase', $purchaseData);
    }

    public function testShow()
    {
        $purchase = Purchase::factory()->create();

        $response = $this->get('/stoke');

        $response->assertStatus(200);
        $response->assertViewHas('purchase');
    }
}