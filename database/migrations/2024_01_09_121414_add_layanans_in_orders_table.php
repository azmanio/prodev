<?php

use App\Models\Layanan;
use App\Models\PaketLayanan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignIdFor(Layanan::class)->nullable();
            $table->foreignIdFor(PaketLayanan::class)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('layanan_id');
            $table->foreignIdFor(PaketLayanan::class)->nullable(False)->change();
        });
    }
};