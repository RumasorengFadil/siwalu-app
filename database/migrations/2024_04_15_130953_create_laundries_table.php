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
        Schema::create('laundries', function (Blueprint $table) {
            $table->id("id_laundry")->autoIncrement();
            $table->foreignId("id_admin");
            $table->string("nama");
            $table->string("alamat");
            $table->string("nomor_telp");
            $table->longText("deskripsi");
            $table->json("jenis_layanan");
            $table->time("jam_buka");
            $table->time("jam_tutup");
            $table->integer("harga");
            $table->float("rating");
            $table->string("foto");
            $table->float("lon");
            $table->float("lan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundries');
    }
};

