<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->unique();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->foreignId('property_type_id')->nullable()->constrained('property_types')->nullOnDelete();
            $table->string('unit_code')->nullable();
            $table->string('name');
            $table->string('nik', 16);
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('address');
            $table->string('job')->nullable();
            $table->unsignedBigInteger('income')->nullable();
            $table->string('payment_method');          // kpr_subsidi / kpr_komersial / tunai
            $table->text('notes')->nullable();
            $table->string('status')->default('baru'); // baru / dihubungi / dipesan / batal
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};