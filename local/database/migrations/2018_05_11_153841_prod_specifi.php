<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdSpecifi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_specifi', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('prod_id')->on('products')->onDelete('cascade');
            $table->integer('prod_color_id')->unsigned();
            $table->foreign('prod_color_id')->references('color_id')->on('prod_color')->onDelete('cascade');
            $table->integer('prod_size_id')->unsigned();
            $table->foreign('prod_size_id')->references('size_id')->on('prod_size')->onDelete('cascade');
            $table->integer('quantity');
            $table->string('image');
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
        Schema::dropIfExists('prod_specifi');
    }
}
