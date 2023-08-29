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
        Schema::create('clusters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_industri');
            $table->double('c1')->nullable();
            $table->double('c2')->nullable();
            $table->double('c3')->nullable();
            $table->double('c4')->nullable();
            $table->double('c5')->nullable();
            $table->double('c6')->nullable();
            $table->double('c7')->nullable();
            $table->double('c8')->nullable();
            $table->double('c9')->nullable();
            $table->double('c10')->nullable();
            $table->double('c11')->nullable();
            $table->double('c12')->nullable();
            $table->double('c13')->nullable();
            $table->double('c14')->nullable();
            $table->double('c15')->nullable();
            $table->double('c16')->nullable();
            $table->double('c17')->nullable();
            $table->double('c18')->nullable();
            $table->double('c19')->nullable();
            $table->double('c20')->nullable();
            $table->double('c21')->nullable();
            $table->double('c22')->nullable();
            $table->double('c23')->nullable();
            $table->double('c24')->nullable();
            $table->double('c25')->nullable();
            $table->double('cluster')->nullable();
            $table->double('index')->nullable();
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
        Schema::dropIfExists('clusters');
    }
};
