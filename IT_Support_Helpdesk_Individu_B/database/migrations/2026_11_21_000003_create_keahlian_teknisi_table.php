<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('keahlian_teknisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teknisi_id')->constrained('teknisi')->cascadeOnDelete();
            $table->foreignId('keahlian_id')->constrained('keahlian')->cascadeOnDelete();
            $table->unique(['teknisi_id','keahlian_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('keahlian_teknisi'); }
};
