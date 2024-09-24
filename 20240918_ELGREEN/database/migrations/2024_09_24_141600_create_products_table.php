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
            $table->enum('cat_product',['Jackets','Leggings','Shorts','Sports Bras','Tank Tops']);
            $table->enum('color',['Blue','Brown','Fuchsia','Green','Navy','Orange','Purple','Red','Royal Blue','Teal']);
            $table->enum('size',['large','medium','small']);
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
        Schema::dropIfExists('products');
    }
};
