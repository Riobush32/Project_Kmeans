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
        Schema::create('data_pilihans', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan')->nullable();
            $table->integer('berizin')->nullable();
            $table->integer('tidak_berizin')->nullable();
            $table->integer('total')->nullable();
            $table->integer('tahun')->nullable();
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
        Schema::dropIfExists('data_pilihans');
    }
};
