<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('order', function (Blueprint $table) {
            $table->id('order_id');
            $table->integer('customer_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->integer('product_quantity');
            $table->integer('sale_price');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('order');
    }

}
