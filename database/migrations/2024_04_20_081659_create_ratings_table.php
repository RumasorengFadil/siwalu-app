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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id("id")->autoIncrement();
            $table->foreignUuid("id_laundry");
            $table->foreignId("id_user")->nullable();
            $table->integer("score");
            $table->longText("rating_comments");
            $table->timestamps();
        });

        // Schema::table('ratings', function (Blueprint $table) {
        //     // Menambahkan kolom dengan foreign key
        //     $table->unsignedBigInteger('id_laundry');
        //     $table->foreign('id_laundry')->references('id_laundry')->on('laundries');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
