<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            // Tambahkan kolom komersil_unit jika belum ada
            if (!Schema::hasColumn('properties', 'komersil_unit')) {
                $table->integer('komersil_unit')->default(0);
            }
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('komersil_unit');
        });
    }
};