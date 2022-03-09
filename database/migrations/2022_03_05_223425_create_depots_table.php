<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depots', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('reference')->unique();
            $table->integer('stock')->default(0);
            $table->float('price')->default(0);
            $table->unsignedBigInteger('fournisseur_id');
            $table->string('photo')->nullable();
            $table->enum('statut',['activer','desactiver'])->default('activer');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depots');
    }
}
