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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('mobile');
            $table->string('parking');
            $table->foreignId('country_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->string('address');
            $table->double('map_latitude', 10, 6);
            $table->double('map_longitude', 10, 6);
            $table->boolean('active')->default(true);
            $table->foreignId('company_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
