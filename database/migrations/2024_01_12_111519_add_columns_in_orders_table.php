<?php

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
            $table->string('no_invoice');
            $table->string('payment_status_xendit');
            $table->string('payment_link');

            $table->timestamp('payment_date')->nullable()->change();
            $table->enum('project_status', ['belum dimulai', 'proses', 'selesai'])->default('belum dimulai')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('no_invoice');
            $table->dropColumn('payment_status_xendit');
            $table->dropColumn('payment_link');
            $table->dropColumn('payment_date');
            $table->dropColumn('project_status');
        });
    }
};