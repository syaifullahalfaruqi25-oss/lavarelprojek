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
    Schema::create('properties', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama perumahan
        $table->string('developer'); // Nama PT pengembang
        $table->string('location'); // Alamat
        $table->string('id_lokasi')->nullable(); // ID Lokasi dari pemerintah
        $table->integer('subsidi_unit')->default(0); // Jumlah unit subsidi
        $table->integer('komersil_unit')->default(0); // Jumlah unit komersil
        $table->string('image')->nullable(); // Link/nama file gambar cover
        $table->text('description')->nullable(); // Deskripsi tambahan (opsional)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
