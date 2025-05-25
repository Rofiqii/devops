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
        Schema::table('event', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_wisata')->after('id');
            $table->foreign('kd_wisata')->references('kd_wisata')->on('wisata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event', function (Blueprint $table) {
            $table->dropForeign(['kd_wisata']);
            $table->dropColumn('kd_wisata');
        });
    }
}; 