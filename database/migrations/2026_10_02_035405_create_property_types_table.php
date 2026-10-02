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
    Schema::create('property_types', function (Blueprint $table) {
        $table->id();
        $table->foreignId('property_id')->constrained()->cascadeOnDelete();
        $table->string('name');
        $table->string('category')->default('subsidi');
        $table->unsignedBigInteger('price')->nullable();
        $table->unsignedInteger('building_area')->nullable();
        $table->unsignedInteger('land_area')->nullable();
        $table->unsignedTinyInteger('bedrooms')->nullable();
        $table->unsignedTinyInteger('bathrooms')->nullable();
        $table->json('images')->nullable();
        $table->json('specs')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_types');
    }
};
