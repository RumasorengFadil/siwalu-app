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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id("id")->autoIncrement();
            $table->foreignId("id_user");
            $table->foreignId("id_admin")->nullable();
            $table->string("nama");
            $table->string("alamat");
            $table->string("nomor_telp");
            $table->longText("deskripsi");
            $table->json("jenis_layanan");
            $table->json("jenis_cucian");
            $table->integer("harga");
            $table->enum('status', ['accept', 'denied']);
            $table->string("foto_ktp");
            $table->string("foto_laundry");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
