<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama perumahan
            $table->string('developer'); // Nama PT pengembang
            $table->string('location'); // Alamat
            $table->string('id_lokasi')->nullable(); // ID Lokasi dari pemerintah
            
            $table->integer('subsidi_unit')->default(0); 
            // INI YANG BENAR NAMANYA menengah_unit (Bukan komersil_unit)
            $table->integer('menengah_unit')->default(0); 
            $table->integer('premium_unit')->default(0); 
            
            $table->string('image')->nullable(); 
            $table->text('description')->nullable(); 
            $table->string('siteplan_image')->nullable();
            
            // 5 KOLOM INI WAJIB ADA KARENA ADA DI FORM FILAMENT-MU
            $table->string('google_maps_url', 2000)->nullable();
            $table->string('marketing_phone')->nullable();
            $table->string('marketing_whatsapp')->nullable();
            $table->string('marketing_email')->nullable();
            $table->string('marketing_address')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};