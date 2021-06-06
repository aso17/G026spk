<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatNormalisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normalisasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->nullable()->constrained('karyawan');
            $table->foreignId('id_alternatif')->constrained('alternatif');
            $table->integer('C1')->nullable();
            $table->integer('C2')->nullable();
            $table->integer('C3')->nullable();
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
        Schema::dropIfExists('normalisasi');
    }
}