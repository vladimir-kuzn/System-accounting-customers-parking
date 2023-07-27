<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('car_colors', function (Blueprint $table) {
            $table->id();
            $table->string('color_id');
            $table->string('hex');
            $table->string('name');
            $table->string('color');
            $table->boolean('metallic');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_colors');
    }
};
