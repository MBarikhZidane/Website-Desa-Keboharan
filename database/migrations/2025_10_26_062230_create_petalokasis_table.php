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
        Schema::create('petalokasis', function (Blueprint $table) {
            $table->id();
            $table->string('utara')->nullable();
            $table->string('selatan')->nullable();
            $table->string('timur')->nullable();
            $table->string('barat')->nullable();
            $table->string('luas_desa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petalokasis');
    }
};
