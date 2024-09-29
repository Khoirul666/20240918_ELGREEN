<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->integer('hrg_produk');
            $table->unsignedBigInteger('cat_product');
            $table->unsignedBigInteger('color');
            $table->unsignedBigInteger('size');
            $table->string('image');
            $table->timestamps();

            $table->foreign('cat_product')->references('id')->on('cat_products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('color')->references('id')->on('colors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('size')->references('id')->on('sizes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
