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
        Schema::create('risk_level', function (Blueprint $table) {
            $table->id('risk_level_id',20);
            $table->string('risk_level_audit',20);
            $table->string('risk_level_date',20);
            $table->string('risk_level_risk_kriteria',20);
            $table->string('risk_level_kegiatan',20);
            $table->string('risk_level_total',20);
            $table->string('risk_level_risk',20);
            $table->string('risk_level_note',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_level');
    }
};
