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
        Schema::create('kartu_keluargas', function (Blueprint $table) {
            $table->id();
            $table->integer("no_kk");
            $table->string("nama");
            $table->string("alamat");
            $table->string("rt_rw");
            $table->string("desa_kelurahan");
            $table->string("kecamatan");
            $table->string("kabupaten_kota");
            $table->integer("kode_pos");
            $table->string("provinsi");
            $table->string("shdk");
            $table->string("ayah");
            $table->string("ibu");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_keluargas');
    }
};
