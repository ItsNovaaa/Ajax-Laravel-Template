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
        Schema::create('jenis_kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan')->unique(10);
            $table->string('nama_kegiatan',10);
            $table->string('kode_kegiatan',10);
            $table->string('id_kegiatan_auditee',10);
            $table->string('isaktif_auditee',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kegiatan');
    }
};
