<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('properties', 'menengah_unit') && Schema::hasColumn('properties', 'komersil_unit')) {
            DB::table('properties')
                ->where('menengah_unit', 0)
                ->where('komersil_unit', '>', 0)
                ->update(['menengah_unit' => DB::raw('komersil_unit')]);
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('properties', 'menengah_unit') && Schema::hasColumn('properties', 'komersil_unit')) {
            DB::table('properties')
                ->where('komersil_unit', 0)
                ->where('menengah_unit', '>', 0)
                ->update(['komersil_unit' => DB::raw('menengah_unit')]);
        }
    }
};
