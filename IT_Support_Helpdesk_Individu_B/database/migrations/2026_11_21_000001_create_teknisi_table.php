<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('teknisi', function (Blueprint $table) {
            $table->id(); $table->string('kode')->unique(); $table->string('nama');
            $table->string('departemen'); $table->string('jabatan'); $table->string('email')->unique();
            $table->string('telepon'); $table->string('ekstensi')->nullable();
            $table->string('lokasi')->nullable(); $table->enum('status',['Aktif','Tidak Aktif'])->default('Aktif');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('teknisi'); }
};
