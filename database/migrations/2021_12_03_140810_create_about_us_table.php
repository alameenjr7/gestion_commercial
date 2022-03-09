<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->text('heading');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->integer('exp_years')->default(2);
            $table->integer('happy_customer')->default(500);
            $table->integer('team_advisor')->default(200);
            $table->integer('return_customer')->default(70);
            $table->string('secure_payment_Gat')->nullable();
            $table->string('quality_products')->nullable();
            $table->string('fast_delivery')->nullable();
            $table->string('cashOn_delivery')->nullable();
            $table->string('free_delivery')->nullable();
            $table->string('customer_support')->nullable();

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
        Schema::dropIfExists('about_us');
    }
}
