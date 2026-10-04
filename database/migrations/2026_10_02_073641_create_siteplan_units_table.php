<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('properties', 'siteplan_image')) {
            Schema::table('properties', function (Blueprint $table) {
                $table->string('siteplan_image')->nullable();
            });
        }
        DB::statement('DROP TABLE IF EXISTS siteplan_units CASCADE');
        Schema::create('siteplan_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->string('code');
            $table->string('category')->default('subsidi');
            $table->string('status')->default('tersedia');
            $table->string('type_name')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->timestamps();

            $table->unique(['property_id', 'code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siteplan_units');
    }
};