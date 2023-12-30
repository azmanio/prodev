<?php

use App\Models\Layanan;
use App\Models\PaketLayanan;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(PaketLayanan::class);
            $table->bigInteger('harga');
            $table->enum('payment_status', ['sukses', 'pending', 'gagal'])->default('pending');
            $table->date('payment_date');
            $table->enum('project_status', ['belum dimulai', 'proses', 'selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};