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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('buku_id');
            $table->foreignUuid('user_id');
            $table->timestamp('tanggal_peminjaman')->useCurrent();
            $table->timestamp('tanggal_pengembalian')->nullable();
            $table->timestamp('tenggat_pengembalian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
