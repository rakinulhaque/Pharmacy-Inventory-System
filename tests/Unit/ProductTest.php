<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/add-product');

        $response->assertStatus(200)
            ->assertViewIs('add_product');
    }

    public function testStore()
    {
        $requestData = [
            'product_name' => 'Test Product',
            'product_description' => 'Test product description',
        ];

        $response = $this->post('/add-product/store', $requestData);

        $response->assertRedirect('/manage-product');

        $this->assertDatabaseHas('products', [
            'product_name' => 'Test Product',
            'product_description' => 'Test product description',
        ]);
    }

    public function testShow()
    {
        $response = $this->get('/manage-product');

        $response->assertStatus(200)
            ->assertViewIs('manage_product');
    }

    public function testEdit()
    {
        $product = Product::factory()->create();

        $response = $this->get('/manage-product/edit/' . $product->id);

        $response->assertStatus(200)
            ->assertViewIs('edit_product');
    }

    public function testUpdate()
    {
        $product = Product::factory()->create();

        $requestData = [
            'product_name' => 'Updated Product',
            'product_description' => 'Updated product description',
        ];

        $response = $this->put('/manage-product/update/' . $product->id, $requestData);

        $response->assertRedirect('/manage-product');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'product_name' => 'Updated Product',
            'product_description' => 'Updated product description',
        ]);
    }

    public function testDestroy()
    {
        $product = Product::factory()->create();

        $response = $this->delete('/manage-product/destroy/' . $product->id);

        $response->assertRedirect('/manage-product');

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}