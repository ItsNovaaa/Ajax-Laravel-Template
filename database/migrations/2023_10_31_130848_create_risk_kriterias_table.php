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
        Schema::create('risk_kriteria', function (Blueprint $table) {
            $table->id('id_risk');
            $table->string('nama_risk');
            $table->string('kode_risk');
            $table->string('level_risk');
            $table->string('isaktid_risk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_kriteria');
    }
};
