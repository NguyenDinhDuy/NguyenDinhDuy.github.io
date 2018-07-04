<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
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
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('bill_email');
            $table->string('bill_code');
            $table->string('bill_name');
            $table->string('bill_payment');
            $table->string('bill_phone');
            $table->string('bill_discount')->default(0);
            $table->string('bill_discount_code')->nullable();
            $table->tinyInteger('status');
            $table->integer('subtotal');
            $table->integer('ship_price')->default(0);
            $table->integer('total');
            $table->text('bill_note')->nullable();
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
