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
            $table->foreignId('id_karyawan')->constrained('karyawan')->onDelete('cascade')->OnUpdate('cascade');
            $table->integer('id_alternatif');
            $table->foreignId('id_kriteria')->constrained('kriteria')->onDelete('cascade')->OnUpdate('cascade');
            $table->foreignId('C1')->constrained('subkriteria');
            $table->foreignId('C2')->constrained('subkriteria');
            $table->foreignId('C3')->constrained('subkriteria');
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