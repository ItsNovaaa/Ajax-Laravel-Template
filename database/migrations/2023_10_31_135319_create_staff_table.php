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
        Schema::create('staff', function (Blueprint $table) {
            $table->id('id_staff',10);
            $table->string('nama_staff',45);
            $table->string('username_staff',20);
            $table->string('nomor_staff',15);
            $table->string('id_staff_auditee',10);
            $table->string('id_staff_position',10);
            $table->string('isaktif_staff',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
