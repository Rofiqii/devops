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
        Schema::create('masukan', function (Blueprint $table) {
            $table->id('kd_masukan');
            $table->string('username_cus');
            $table->string('nama');
            $table->text('masukan');
            $table->foreign('username_cus')->references('username_cus')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masukan');
    }
};
