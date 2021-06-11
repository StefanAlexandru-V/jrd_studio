<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComenziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comenzi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_client')->default('0');
            $table->unsignedBigInteger('cerere_id')->default('0');
            $table->boolean('facturata')->default(0);
            $table->string('nume_client')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('numar_cerere')->nullable();
            $table->bigInteger('pret')->nullable();
            $table->string('tip_comanda')->nullable();
            $table->date('data_programare')->nullable();
            $table->foreign('id_client')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('cerere_id')->references('id')->on('cereri')->cascadeOnDelete();
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
        Schema::dropIfExists('comenzi');
    }
}
