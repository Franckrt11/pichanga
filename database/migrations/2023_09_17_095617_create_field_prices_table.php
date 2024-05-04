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
        Schema::create('field_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('half');
            $table->unsignedSmallInteger('whole');
            $table->boolean('active')->default(true);
            $table->foreignId('field_hour_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_prices');
    }
};
