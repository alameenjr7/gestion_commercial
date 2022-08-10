<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('address');
            $table->string('footer')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('snapchat_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('playStore_url')->nullable();
            $table->string('appStore_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->text('map_url')->nullable();
            $table->boolean('paypal_sandbox')->default(1);


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
        Schema::dropIfExists('settings');
    }
}
