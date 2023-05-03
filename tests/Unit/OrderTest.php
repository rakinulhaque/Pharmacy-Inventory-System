<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order;

class OrderTest extends TestCase
{
    use RefreshDatabase;



    public function testOrderTableName()
    {
        $order = new Order();

        $this->assertEquals('order', $order->getTable()); // Check that the table name is correct
    }
}
