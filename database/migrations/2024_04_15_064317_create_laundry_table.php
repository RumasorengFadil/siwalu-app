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
        Schema::create('laundry', function (Blueprint $table) {
            $table->id("id_laundry");
            $table->id("id_admin");
            $table->string("nama");
            $table->string("alamat");
            $table->string("nomor_telp");
            $table->time("jam_buka");
            $table->time("jam_tutup");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry');
    }
};
