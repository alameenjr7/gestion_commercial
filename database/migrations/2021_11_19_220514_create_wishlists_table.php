<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cat_id');
            $table->float('price')->default(0);
            $table->enum('size',['S','M','L','XL'])->default('S');
            $table->integer('quantity');
            $table->float('amount')->default(0);


            $table->foreign('product_id')->references('id')->on('brands')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('categories')->onDelete('CASCADE');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('CASCADE');
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
        Schema::dropIfExists('wishlists');
    }
}
