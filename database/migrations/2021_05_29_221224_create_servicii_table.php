<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicii', function (Blueprint $table) {
            $table->id();
            $table->boolean('evidentiat')->default(0);
            $table->string('titlu')->nullable();
            $table->string('detalii')->nullable();
            $table->bigInteger('pret_orientativ')->nullable();
            $table->string('imagine')->nullable();
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
        Schema::dropIfExists('servicii');
    }
}
