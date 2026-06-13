<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {

            $table->id();

            $table->string('kode_pinjam', 30)->unique();

            $table->foreignId('peminjam_id')
                ->constrained('peminjam')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->date('tanggal_pinjam');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
