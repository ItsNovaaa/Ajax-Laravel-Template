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
        Schema::create('penalty', function (Blueprint $table) {
            $table->id('id_penalty');
            $table->integer('penalty_audit');
            $table->integer('penalty_staff');
            $table->integer('penalty_risk_level');
            $table->integer('penalty_rate');
            $table->string('penalty_notes',50);
            $table->string('penalty_isaktif',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalty');
    }
};
