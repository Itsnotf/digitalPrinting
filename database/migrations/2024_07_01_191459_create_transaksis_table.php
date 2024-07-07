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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignId('id_produk')->constrained('produks')->cascadeOnDelete();
            $table->foreignId('id_pembayaran')->constrained('pembayarans')->cascadeOnDelete();
            $table->string('qty');
            $table->string('catatan');
            $table->string('bukti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
