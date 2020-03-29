<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('email')->nullable();
            $table->float('total_price');
            $table->string('name');
            $table->string('phone');
            $table->string('note')->nullable();
            $table->string('address');
            $table->string('order_status')->default('1');
            $table->string('coupon_code')->nullable();
            $table->string('coupon_amount')->nullable();
            $table->float('coupon_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
