<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kartu_tanda_penduduks', function (Blueprint $table) {
            $table->id();
            $table->integer("nik");
            $table->string("nama");
            $table->string("tempat");
            $table->date("tanggal_lahir");
            $table->string("jenis_kelamin");
            $table->string("gol_darah");
            $table->string("alamat");
            $table->string("rt_rw");
            $table->string("desa_kelurahan");
            $table->string("kecamatan");
            $table->string("agama");
            $table->string("status_perkawinan");
            $table->string("perkerjaan");
            $table->string("kewarganegaraan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_tanda_penduduks');
    }
};
