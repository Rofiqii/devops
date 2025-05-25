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
        Schema::create('wisata', function (Blueprint $table) {
            $table->id('kd_wisata');
            $table->string('nama_wisata');
            $table->text('keterangan');
            $table->string('lokasi');
            $table->string('kategori');
            $table->string('gambarwisata')->nullable();
            $table->string('username_admin');
            $table->foreign('username_admin')->references('username_admin')->on('admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisata');
    }
};
