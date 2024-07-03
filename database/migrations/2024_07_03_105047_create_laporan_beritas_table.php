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
        Schema::create('laporan_beritas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('berita_id')->constrained('beritas')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('penyebab', ['Spam atau penipuan', 'Konten yang mengandung SARA', 'Konten yang tidak benar atau menyesatkan', 'Pelanggaran hak cipta', 'Konten yang tidak pantas']);
            $table->text('alasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_beritas');
    }
};
