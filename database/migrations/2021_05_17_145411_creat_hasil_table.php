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
            $table->foreignId('id_normalisasi')->constrained('normalisasi')->onDelete('cascade')->OnUpdate('cascade');
            $table->decimal('amount', 4, 4);
            $table->char('status_pengajuan', 10);
            $table->date('tgl_pengajuan');
            $table->date('tgl_approve');
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