<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatHasilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->nullable()->constrained('karyawan');
            $table->foreignId('sanksi_id')->nullable()->constrained('ketentuan_sanksi');
            $table->decimal('hasil', 1, 1)->nullable();
            $table->char('status_pengajuan', 10)->nullable();
            $table->date('tgl_pengajuan')->nullable();
            $table->date('tgl_approve')->nullable();
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
        Schema::dropIfExists('hasil');
    }
}