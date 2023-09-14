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
        Schema::create('nilai_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('inisialisasi')->nullable();
            $table->integer('index_m')->nullable();
            $table->double('nilai_m')->nullable();
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
        Schema::dropIfExists('nilai_m_s');
    }
};
