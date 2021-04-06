<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik_karyawan')->unique();
            $table->string('nama_lengkap', 100);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->date('tanggal_mulaikerja');
            $table->char('jenis_kelamin', 10);
            $table->char('agama', 10);
            $table->char('departemen', 50);
            $table->char('jabatan', 50);
            $table->char('status_karyawan', 10);
            $table->char('foto', 50);
            $table->char('no_telepon', 12)->unique();
            $table->char('npwp', 15)->unique();
            $table->string('email', 150)->unique();
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
        Schema::dropIfExists('karyawan');
    }
}