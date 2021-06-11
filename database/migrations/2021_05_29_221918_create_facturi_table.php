<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_comanda');
            $table->string('nume_client')->nullable();
            $table->string('adresa_client')->nullable();
            $table->string('serviciu')->nullable();
            $table->bigInteger('suma')->nullable();
            $table->string('moneda')->default('RON');
            $table->date('data_incheiere')->nullable();
            $table->foreign('id_client')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('id_comanda')->references('id')->on('comenzi')->cascadeOnDelete();
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
        Schema::dropIfExists('facturi');
    }
}
