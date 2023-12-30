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
        Schema::create('paket_layanans', function (Blueprint $table) {
            $table->id();
            $table->integer('layanan_id');
            $table->string('nama');
            $table->bigInteger('harga');
            $table->string('deskripsi');
            $table->string('fitur');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_layanans');
    }
};
