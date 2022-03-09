<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDepotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_depots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('depot_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity')->default(0);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->foreign('depot_id')->references('id')->on('depots')->onDelete('CASCADE');
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
        Schema::dropIfExists('product_depots');
    }
}
