<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('types', 'price')) {
            Schema::table('types', function (Blueprint $table) {
                $table->dropColumn('price');
            });
        }

        if (Schema::hasColumn('units', 'price')) {
            Schema::table('units', function (Blueprint $table) {
                $table->dropColumn('price');
            });
        }
    }

    public function down(): void
    {
        Schema::table('types', function (Blueprint $table) {
            $table->decimal('price', 15, 2)->nullable();
        });

        Schema::table('units', function (Blueprint $table) {
            $table->decimal('price', 15, 2)->nullable();
        });
    }
};