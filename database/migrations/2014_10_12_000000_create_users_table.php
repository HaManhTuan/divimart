<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address');
            $table->string('born')->nullable();
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->integer('admin');
            $table->enum('type', ['Admin', 'User']);
            $table->integer('category_access');
            $table->integer('product_access');
            $table->integer('order_access');
            $table->integer('store_access');
            $table->integer('config_access');
            $table->integer('customer_access');
            $table->integer('user_access');
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
        Schema::dropIfExists('users');
    }
}
