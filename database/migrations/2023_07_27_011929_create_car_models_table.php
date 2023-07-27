<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->string('id_model');
            $table->string('name');
            $table->string('cyrillic_name');
            $table->string('class')->nullable();
            $table->integer('year_from');
            $table->integer('year_to')->nullable();
            $table->unsignedBigInteger('brand_id');

            $table->foreign('brand_id')->references('id')->on('car_brands')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
