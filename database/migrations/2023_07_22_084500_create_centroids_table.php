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
        Schema::create('centroids', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan')->nullable();
            $table->double('berizin')->nullable();
            $table->double('tidak_berizin')->nullable();
            $table->double('total')->nullable();
            $table->integer('tahun')->nullable();
            $table->integer('iterasi')->nullable();
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
        Schema::dropIfExists('centroids');
    }
};
