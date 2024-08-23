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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->datetime('start_date')->nullable();
            $table->float('time', 3, 1);
            $table->string('game');
            $table->unsignedSmallInteger('price');
            $table->boolean('inscription');
            $table->enum('status', ['pending', 'confirm', 'cancel']);
            $table->foreignId('field_hour_id')->constrained();
            $table->foreignId('field_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserves');
    }
};
