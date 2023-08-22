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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('mobile');
            $table->string('parking');
            $table->string('size');
            $table->string('type');
            $table->string('players');
            $table->string('games');
            $table->string('country');
            $table->string('city');
            $table->string('district');
            $table->string('address');
            $table->string('map');
            $table->boolean('active');
            $table->string('portrait')->nullable();
            $table->foreignId('company_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
