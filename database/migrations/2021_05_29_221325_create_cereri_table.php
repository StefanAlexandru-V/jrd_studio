<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCereriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cereri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_client')->default('0');
            $table->unsignedBigInteger('id_serviciu')->default('0');
            $table->string('nume_client')->nullable();
            $table->string('adresa_client')->nullable();
            $table->string('serviciu')->nullable();
            $table->string('telefon_client')->nullable();
            $table->string('mesaj')->nullable();
            $table->foreign('id_client')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('id_serviciu')->references('id')->on('servicii')->cascadeOnDelete();
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
        Schema::dropIfExists('cereri');
    }
}
