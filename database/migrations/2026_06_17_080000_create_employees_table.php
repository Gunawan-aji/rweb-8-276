<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 18);
            $table->string('nama_lengkap', 100);
            $table->string('jabatan', 50);
            $table->string('email')->unique();
            $table->timestamps();

            $table->index('nip');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};

