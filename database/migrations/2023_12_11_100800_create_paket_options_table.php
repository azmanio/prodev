<?php

use App\Models\Layanan;
use App\Models\PaketLayanan;
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
        Schema::create('paket_options', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Layanan::class);
            $table->foreignIdFor(PaketLayanan::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_options');
    }
};
