<?php

namespace Tests\Feature;

use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupplierControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/add-supplier');

        $response->assertStatus(200)
            ->assertViewIs('add_supplier');
    }

    public function testStore()
    {
        $requestData = [
            'supplier_name' => 'Test Supplier',
            'supplier_Phone_num' => '1234567890',
        ];

        $response = $this->post('/add-supplier/store', $requestData);

        $response->assertRedirect('/manage-supplier');

        $this->assertDatabaseHas('suppliers', [
            'supplier_name' => 'Test Supplier',
            'supplier_Phone_num' => '1234567890',
        ]);
    }

    public function testShow()
    {
        $response = $this->get('/manage-supplier');

        $response->assertStatus(200)
            ->assertViewIs('manage_supplier');
    }

    public function testEdit()
    {
        $supplier = Supplier::factory()->create();

        $response = $this->get('/manage-supplier/edit/' . $supplier->id);

        $response->assertStatus(200)
            ->assertViewIs('edit_supplier');
    }

    public function testUpdate()
    {
        $supplier = Supplier::factory()->create();

        $requestData = [
            'supplier_name' => 'Updated Supplier',
            'supplier_Phone_num' => '0987654321',
        ];

        $response = $this->put('/manage-supplier/update/' . $supplier->id, $requestData);

        $response->assertRedirect('/manage-supplier');

        $this->assertDatabaseHas('suppliers', [
            'id' => $supplier->id,
            'supplier_name' => 'Updated Supplier',
            'supplier_Phone_num' => '0987654321',
        ]);
    }

    public function testDestroy()
    {
        $supplier = Supplier::factory()->create();

        $response = $this->delete('/manage-supplier/destroy/' . $supplier->id);

        $response->assertRedirect('/manage-supplier');

        $this->assertDatabaseMissing('suppliers', [
            'id' => $supplier->id,
        ]);
    }
}